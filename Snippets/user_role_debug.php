$data = get_userdata( get_current_user_id() );
 
if ( is_object( $data) ) {
    $current_user_caps = $data->allcaps;
     
    // print it to the screen
    echo '<pre>' . print_r( $current_user_caps, true ) . '</pre>';
}
