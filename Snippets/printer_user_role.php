// Add a custom user role

$result = add_role( 'printer', __(

'Printer' ),

array(
'edit_plugins' => true,
'manage_options' => true,
// 'unfiltered_html' => true,
'manage_woocommerce' => true,
'read' => true
)

);
