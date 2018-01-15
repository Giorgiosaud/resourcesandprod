<?php
function contactdetails_child($atts)
{
    extract(shortcode_atts(array(
        'title'          => 'Visit Our Office',
        'address'          => '',
        'phone'         => '',
        'email'         => '',

        ), $atts));
    $tel = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $contact_address_return = '<div class="col-sm-4 wow zoomIn contactdetails" data-wow-duration="700ms" data-wow-delay="300ms">';

    $contact_address_return .= '<h2>'.$title.'</h2>';
    $contact_address_return .= '<address>';
    if($address!='')
        $contact_address_return .= "<p><i class='fa fa-map-marker'></i> Address: $address</p>";
    if($phone!='')
        $contact_address_return .= "<p><i class='fa fa-phone'></i> <a href='tel:$tel' target=\"_blank\">Telefono: $phone </a></p>";
    if($email!='')
        $contact_address_return .= "<p><i class='fa fa-envelope'></i> Email: <a href='mailto:$email' target=\"_blank\"> $email</a></p>";
    $contact_address_return .= '</address>';
    $contact_address_return .= '</div>';

    return $contact_address_return;
}
add_shortcode( "zp-contactdetails", "contactdetails_child" );


function contactdetails_child2($atts)
{
    extract(shortcode_atts(array(
        'title'          => 'Visit Our Office',
        'address'          => '',
        'phones'         => '',
        'emails'        =>'',

        ), $atts));
    $phones=explode(',',$phones);
    $emails=explode(',',$emails);
    $tels=array();
    foreach ($phones as $telephone) {
        array_push($tels,filter_var($telephone,FILTER_SANITIZE_NUMBER_INT));
    }
    $contact_address_return = '<div class="col-sm-6 wow zoomIn contactdetails" data-wow-duration="700ms" data-wow-delay="300ms">';
    $contact_address_return .= "<h2>$title</h2>";
    $contact_address_return .= '<address>';
    if($address!='')
        $contact_address_return .= "<p><i class='fa fa-map-marker'></i>$address</p>";
    if(sizeof($phones)>1){
        foreach ($phones as $key => $telephone) {
            $contact_address_return .= "<p><i class='fa fa-phone'></i> <a href='tel:$tels[$key]' target='_blank'> $telephone </a></p>";
        }
    }
    if(sizeof($emails)>1){
        foreach ($emails as $email) {
            $contact_address_return .= "<p><i class='fa fa-envelope'></i><a href='mailto:$email' target='_blank'> $email</a></p>";
        }
    }
    $contact_address_return .= '</address>';
    $contact_address_return .= '</div>';

    return $contact_address_return;
}
add_shortcode( "zp-contactdetails", "contactdetails_child2" );
