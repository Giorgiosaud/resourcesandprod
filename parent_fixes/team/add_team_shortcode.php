<?php
  add_action('init', 'based_on_doors_tw_team_shortcode');

  function based_on_doors_tw_team_shortcode() {
    add_shortcode( 'zp-team', 'team_shortcode_child' );
  }
  function team_shortcode_child($atts) {
    extract(shortcode_atts(array(
        'title' => 'Meet Our Team',
        'type' => 'normal',
        'category' => '',
        'id' => 'team-carousel',
        'member' => '4'
                    ), $atts));

    $team_return = '';

    if ($type == 'slide') {
        $args = array(
            'post_type' => array('team'),
            'post_status' => array('publish'),
            'posts_per_page' => $member,
            'orderby' => 'date',
            'order' => 'DESC',
            'our_team' => $category
        );

        query_posts($args);
        if (have_posts()) {
            $total = 0;
            while (have_posts()) {
                the_post();
                $total++;
            }
            $team_return .= '<div class="our-team padding-bottom wow zoomIn" data-wow-duration="700ms" data-wow-delay="300ms">';
            $team_return .= '<h2 class="text-center heading">' . $title . '</h2>';
            $team_return .= '<div id="'.$id.'" class="carousel slide" data-ride="carousel">';
            $team_return .= '<a class="team-carousel-left" href="#'.$id.'" data-slide="prev"><i class="fa fa- fa-chevron-left"></i></a>
                             <a class="team-carousel-right" href="#'.$id.'" data-slide="next"><i class="fa fa- fa-chevron-right"></i></a>';
            $team_return .= '<div class="carousel-inner">';
            $i = 1;
            while (have_posts()) {
                the_post();
                if (has_post_thumbnail()) {
                    $thumgSmall = get_the_post_thumbnail(get_the_ID(), 'square-big', array('class' => 'img-responsive'));
                } else {
                    $thumgSmall = '<img class="img-responsive" src="http://placehold.it/600x600" alt="' . get_the_title() . '"/>';
                }
                if ($i == 1) {
                    $team_return .= '<div class="item active"><div class="row">';
                }

                $team_return .= '<div class="col-sm-6">
                                <div class="team-member">
                                    <div class="member-image">
                                        ' . $thumgSmall . '
                                    </div>
                                    <div class="overlay">
                                        <h4>' . get_the_title() . '</h4>
                                        <p>' . get_the_excerpt() . '</p>
                                        <p> <a href="<?php the_permalink() ?>">Leer Más</a></p>
                                        <ul class="social-icons">';
                $f = get_post_meta(get_the_ID(), 'facebook', TRUE);
                if ($f != '') {
                    $team_return .= '<li><a href="' . $f . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                }
                $t = get_post_meta(get_the_ID(), 'twitter', TRUE);
                if ($t != '') {
                    $team_return .= '<li><a href="' . $t . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                }
                $d = get_post_meta(get_the_ID(), 'drible', TRUE);
                if ($d != '') {
                    $team_return .= '<li><a href="' . $d . '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
                }
                $l = get_post_meta(get_the_ID(), 'linkedin', TRUE);
                if ($l != '') {
                    $team_return .= '<li><a href="' . $l . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
                }
                $g = get_post_meta(get_the_ID(), 'google', TRUE);
                if ($g != '') {
                    $team_return .= '<li><a href="' . $g . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
                }

                $team_return .= '</ul>
                                    </div>
                                </div>							
                            </div>';

                if ($i % 4 == 0 && $i < $total) {
                    $team_return .='</div></div><div class="item"><div class="row">';
                } elseif ($i % 4 == 0 && $i == $total) {
                    $team_return .='</div></div>';
                } elseif ($i == $total) {
                    $team_return .='</div></div>';
                }
                $i++;
            }
            $team_return .= '</div>';

            $team_return .= '</div>';
            $team_return .= '</div>';
        } else {
            $team_return .= '<h1 class="query_worning">Create Some Team Member.</h1>';
        }
        wp_reset_query();
    } else {
        $args1 = array(
            'post_type' => array('team'),
            'post_status' => array('publish'),
            'posts_per_page' => $member,
            'orderby' => 'date',
            'order' => 'DESC',
            'our_team' => $category
        );

        query_posts($args1);
        if (have_posts()) {
            $team_return .= '<h2 class="text-center heading">' . $title . '</h2>';
            //if 3 team member open this line also bottom one div which commented. if 2 team member  remove the class col-3-offest and add col-md-offest-3
            //$team_return .= '<div class="col-md-12 col-3-offest">';
            $team_return .= '<div class="our-team padding-bottom wow zoomIn" data-wow-duration="700ms" data-wow-delay="300ms">';
            while (have_posts()):
                the_post();
                if (has_post_thumbnail()) {
                    $thumgSmall = get_the_post_thumbnail(get_the_ID(), 'square-big', array('class' => 'img-responsive'));
                } else {
                    $thumgSmall = '<img class="img-responsive" src="http://placehold.it/600x600" alt="' . get_the_title() . '"/>';
                }


                $team_return .= '<div class="col-sm-6">
                                <div class="team-member">
                                    <div class="member-image">
                                        ' . $thumgSmall . '
                                    </div>
                                    <div class="overlay">
                                        <h4>' . get_the_title() . '</h4>
                                        <p>' . substr(get_the_content(), 0, 100) . '</p>
                                        <ul class="social-icons">';
                $f = get_post_meta(get_the_ID(), 'facebook', TRUE);
                if ($f != '') {
                    $team_return .= '<li><a href="' . $f . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                }
                $t = get_post_meta(get_the_ID(), 'twitter', TRUE);
                if ($t != '') {
                    $team_return .= '<li><a href="' . $t . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                }
                $d = get_post_meta(get_the_ID(), 'drible', TRUE);
                if ($d != '') {
                    $team_return .= '<li><a href="' . $d . '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
                }
                $l = get_post_meta(get_the_ID(), 'linkedin', TRUE);
                if ($l != '') {
                    $team_return .= '<li><a href="' . $l . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
                }
                $g = get_post_meta(get_the_ID(), 'google', TRUE);
                if ($g != '') {
                    $team_return .= '<li><a href="' . $g . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
                }

                $team_return .= '</ul>
                                    </div>
                                </div>							
                            </div>';




            endwhile;
            $team_return .= '</div>';
            //if 2 or 3 team  member
            //$team_return .= '</div>';
        } else {
            $team_return .= '<h1 class="query_worning">Create Some Team Member.</h1>';
        }
        wp_reset_query();
    }

    return $team_return;
}
