add_action( 'admin_init', 'remove_menu_pages' );

function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']);
  	}

function block_top_wp_seo() {
    global $wp_admin_bar;
    
    if (current_user_can('administrator')) {
        return;
    }
    
    $wp_admin_bar->remove_node('kinsta-cache');
  	$wp_admin_bar->remove_node('query-monitor');
  $wp_admin_bar->remove_node('comments');
  $wp_admin_bar->remove_node('new-post');
  $wp_admin_bar->remove_node('new-page');
  $wp_admin_bar->remove_node('new-product');
  $wp_admin_bar->remove_node('new-shop_coupon');
  $wp_admin_bar->remove_node('new-pw_bogo');
  $wp_admin_bar->remove_node('new-staticblocks');
  $wp_admin_bar->remove_node('new-testimonial');
  $wp_admin_bar->remove_node('new-smart_offers');
  $wp_admin_bar->remove_node('new-etheme_portfolio');

	}

function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}

function remove_menu_pages() {
  	if ( current_user_can( 'administrator' ) ) {
	  	return false;
	}
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
	  remove_menu_page('wpseo_dashboard');	  // WC products
	  remove_menu_page('pys_dashboard');	  // WC products
	  remove_menu_page('optin-monster-api-settings');	  // WC products
	  remove_menu_page('monsterinsights_settings');	  // WC products
	  remove_menu_page('plugins.php');	  // WC products
	  remove_menu_page('edit.php?post_type=testimonial');	  // WC products
	  remove_menu_page('edit.php?post_type=staticblocks');	  // WC products
	  remove_menu_page('edit.php?post_type=etheme_portfolio');	  // WC products
	    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	  	add_action('wp_before_admin_bar_render', 'block_top_wp_seo');
	 	add_filter('pre_site_transient_update_core','remove_core_updates');
		add_filter('pre_site_transient_update_plugins','remove_core_updates');
		add_filter('pre_site_transient_update_themes','remove_core_updates');
	}
  	if ( current_user_can( 'order_administrator' ) ) {
  		remove_menu_page('edit.php');                	  // Posts
	  	remove_menu_page('plugin-editor.php');       	  // Plugin editor
		remove_menu_page('edit-comments.php');     		  // Comments
		remove_menu_page('tools.php');                	  // Tools
		remove_menu_page('upload.php');            	      // Media
	  	remove_menu_page('link-manager.php');      	      // Links
		remove_menu_page('edit.php?post_type=page');      // Pages
	  	remove_menu_page('profile.php');                  // Users
	  	remove_menu_page('options-general.php');          // Options
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
	  	remove_menu_page('pmxi-admin-home');			  // WPAI
	  	remove_menu_page('pmxe-admin-home');			  // WPAE
	  	remove_menu_page('cptui_main_menu');			  // CPT
	  	remove_menu_page('production-jesus-filtering');	  // Jesus Filtering Settings
	  	remove_menu_page('checkout_cart_settings');		  // Checkout Settings
	  	remove_menu_page('edit.php?post_type=product');	  // WC products
	  remove_menu_page('wpseo_dashboard');	  // WC products
	  remove_menu_page('pys_dashboard');	  // WC products
	  remove_menu_page('optin-monster-api-settings');	  // WC products
	  remove_menu_page('monsterinsights_settings');	  // WC products
	  remove_menu_page('plugins.php');	  // WC products
	  remove_menu_page('edit.php?post_type=testimonial');	  // WC products
	  remove_menu_page('edit.php?post_type=staticblocks');	  // WC products
	  remove_menu_page('edit.php?post_type=etheme_portfolio');	  // WC products
	  	remove_submenu_page('woocommerce', 'glscimkek');
	  	remove_submenu_page('woocommerce', 'wc_admin_custom_order_fields');
	  	remove_submenu_page('woocommerce', 'wc-cart-notices');
	  	remove_submenu_page('woocommerce', 'woocommerce_coupon_generator');
	  	remove_submenu_page('woocommerce', 'woo_st');
	  	remove_submenu_page('woocommerce', 'wc-reports');
	  	remove_submenu_page('woocommerce', 'wc-settings');
	  	remove_submenu_page('woocommerce', 'wc-status');
	  	remove_submenu_page('woocommerce', 'wc-addons');
	    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	  	add_action('wp_before_admin_bar_render', 'block_top_wp_seo');
	    add_filter('pre_site_transient_update_core','remove_core_updates');
		add_filter('pre_site_transient_update_plugins','remove_core_updates');
  		add_filter('pre_site_transient_update_themes','remove_core_updates');
	}
}
