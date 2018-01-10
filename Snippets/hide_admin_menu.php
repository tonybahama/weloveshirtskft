// Remove menu items for Printer users
add_action( 'admin_init', 'remove_menu_pages' );

function remove_menu_pages() {
	if ( current_user_can( 'printer' ) ) {

  		remove_menu_page('edit.php');                	  // Posts
	  	remove_menu_page('plugin-editor.php');       	  // Plugin editor
		  remove_menu_page('edit-comments.php');     		  // Comments
		  remove_menu_page('tools.php');                	  // Tools
		  remove_menu_page('upload.php');            	      // Media
	  	remove_menu_page('link-manager.php');      	      // Links
		  remove_menu_page('edit.php?post_type=page');      // Pages
	  	remove_menu_page('profile.php');                  // Users
	  	remove_menu_page('options-general.php');          // Options
	  	remove_menu_page('woocommerce');			      // WC
	  	remove_menu_page('production-jesus-settings');	  // PJ Settings
	  	remove_menu_page('index.php');					  // Dashboard
	  	remove_menu_page('kinsta-tools');				  // Kinsta
	    remove_menu_page('pimwick');				  	  // Pimwick
	  	remove_menu_page('separator1');				  	  // Separator
	  	remove_menu_page('separator2');				      // Separator
	  	remove_menu_page('separator-last');				  // Separator
	  	remove_menu_page('separator-woocommerce');		  // Separator
	  	remove_menu_page('tinvwl');				 		  // Wishlist
	  	remove_menu_page('themes.php');				 	  // Themes
	  	remove_menu_page('vc-general');				  	  // VC
	  	remove_menu_page('mailchimp-for-wp');			  // MC
	  	remove_menu_page('pmxe-admin-home');			  // WPAE
	  	remove_menu_page('pmxi-admin-home');			  // WPAI
	  	remove_menu_page('cptui_main_menu');			  // CPT
	  	remove_menu_page('production-jesus-filtering');	  // Jesus Filtering Settings
	  	remove_menu_page('checkout_cart_settings');		  // Checkout Settings
	  	remove_menu_page('edit.php?post_type=product');	  // WC products

//Disable core update notifications
function remove_core_updates(){
  global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
				}
  add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');

//Hide admin dashboard widgets
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );  
	function remove_dashboard_widgets() {
    	global $wp_meta_boxes;
    	unset($wp_meta_boxes['dashboard']);
		}
		
	}
}
