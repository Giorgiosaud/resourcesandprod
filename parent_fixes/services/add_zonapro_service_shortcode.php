<?php
  add_action('init', 'based_on_doors_service_shortcode');

  function based_on_doors_service_shortcode() {
    add_shortcode( 'zonapro-service', 'service_shortcode_child' );
  }



  function service_shortcode_child($atts) {
    extract(shortcode_atts(array(
      'category' => '',
      'type' => '',
      'sitem' => '',
      'ids'=>'',
      ), $atts, 'wishlist')); 
    if($ids!=''){
      $posts=explode(', ',$ids);
    }
    else{
      $posts=array();
    }
    var_dump($posts);
    $service_return = '';

    $service_return .= '<div class="container"><div class="row">';



    $q = new WP_Query(
      array('post_type' => array('service'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'post_in' => $posts,
        'posts_per_page' => $sitem,
        'service-category' => $category)
      );


    $service_return = '<div class="item active">';
    while ($q->have_posts()) : $q->the_post();
        //$idz = get_the_ID();
    $icon = get_post_meta(get_the_ID(), 'serviceIcon_child', true);
    if ($icon != '' && $icon != 1) {
      $ico = 'fa ' . $icon;
    } else {
      $ico = 'fa fa-bomb';
    }
    $service_return .= '

    <div class="col-md-3 col-sm-6 wow zoomIn text-center service-item" data-wow-duration="700ms" data-wow-delay="300ms">          
      <div class="service-icon">
        <i class="' . $ico . '"></i>              
      </div>
      <div class="service-text">
        <h4>' . get_the_title() . '</h4>
        <p>' .get_the_content(). '</p>
      </div>          
    </div>

    ';
    endwhile;
    $service_return.= '</div>';
    wp_reset_query();
    $service_return .= '</div>';

    return $service_return;
  }

  add_shortcode('doors-service', 'service_shortcode');