// Add a custom user role

remove_role( 'order_administrator' );

$result = add_role( 'order_administrator', __(

'Order Administrator' ),

array(
'read' => true,
'read_private_pages' => true,
'read_private_posts' => true,
'edit_posts' => true,
'edit_pages' => true,
'edit_published_posts' => true,
'edit_published_pages' => true,
'edit_private_pages' => true,
'edit_private_posts' => true,
'edit_others_posts' => true,
'edit_others_pages' => true,
'publish_posts' => true,
'publish_pages' => true,
'manage_categories' => true,
'export' => true,
'manage_woocommerce' => true,
'view_woocommerce_reports' => true,
'edit_product' => true,
'read_product' => true,
'edit_products' => true,
'edit_others_products' => true,
'publish_products' => true,
'read_private_products' => true,
'edit_private_products' => true,
'edit_published_products' => true,
'manage_product_terms' => true,
'edit_product_terms' => true,
'assign_product_terms' => true,
'edit_shop_order' => true,
'read_shop_order' => true,
'edit_shop_orders' => true,
'edit_others_shop_orders' => true,
'publish_shop_orders' => true,
'read_private_shop_orders' => true,
'edit_private_shop_orders' => true,
'edit_published_shop_orders' => true,
'manage_shop_order_terms' => true,
'edit_shop_order_terms' => true,
'assign_shop_order_terms' => true,
'edit_shop_coupon' => true,
'read_shop_coupon' => true,
'edit_shop_coupons' => true,
'edit_others_shop_coupons' => true,
'publish_shop_coupons' => true,
'read_private_shop_coupons' => true,
'edit_private_shop_coupons' => true,
'edit_published_shop_coupons' => true,
'manage_shop_coupon_terms' => true,
'edit_shop_coupon_terms' => true,
'assign_shop_coupon_terms' => true,
'manage_options' => true,
'shop_manager' => true
)

);
