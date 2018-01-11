// Add a custom user role

$result = add_role( 'order_administrator', __(

'Order Administrator' ),

array(
'edit_plugins' => true,
'manage_options' => true,
'unfiltered_html' => true,
'manage_woocommerce' => true,
'read' => true,
'edit_shop_order' => true,
'read_shop_order' => true,
'edit_shop_orders' => true,
'publish_shop_orders' => true,
'view_woocommerce_reports' => true
)

);
