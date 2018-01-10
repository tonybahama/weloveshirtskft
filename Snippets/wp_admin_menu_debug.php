if (!function_exists('debug_admin_menus')):
function debug_admin_menus() {
if ( !is_admin())
        return;
    global $submenu, $menu, $pagenow;
    if ( current_user_can('printer') ) { // ONLY DO THIS FOR ADMIN
        if( $pagenow == 'index.php' ) {  // PRINTS ON DASHBOARD
            echo '<pre>'; print_r( $menu ); echo '</pre>'; // TOP LEVEL MENUS
            echo '<pre>'; print_r( $submenu ); echo '</pre>'; // SUBMENUS
        }
    }
}
add_action( 'admin_notices', 'debug_admin_menus' );
endif;
