<?php

/*
Plugin Name: Order List Table
*/

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


class Orders_List extends WP_List_Table {

	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'order', 'sp' ), //singular name of the listed records
			'plural'   => __( 'orders', 'sp' ), //plural name of the listed records
			'ajax'     => false //does this table support ajax?
		] );

	}


	/**
	 * Retrieve orders data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_orders( $per_page = 5, $page_number = 1 ) {

		global $wpdb;

		$sql = "SELECT p.ID as order_id,
		         max( CASE WHEN pm.meta_key = '_shipping_first_name' and p.ID = pm.post_id THEN pm.meta_value END ) as _shipping_first_name,
		         max( CASE WHEN pm.meta_key = '_checked_in' and p.ID = pm.post_id THEN pm.meta_value END ) as _checked_in,
		         ( select group_concat( order_item_name separator '<br>' ) from wp_woocommerce_order_items where order_id = p.ID ) as order_items
		         FROM
		         `wp_posts` p LEFT JOIN wp_postmeta pm ON (pm.post_id = p.ID )
		         LEFT JOIN wp_woocommerce_order_items oi ON (p.ID = oi.order_id)
		         WHERE
		         p.post_type = 'shop_order'
		         and p.post_status = 'wc-pending'
		         group by p.ID";


		$result = $wpdb->get_results( $sql, 'ARRAY_A' );

		return $result;
	}



	/** Text displayed when no order data is available */
	public function no_items() {
		_e( 'No orders avaliable.', 'sp' );
	}


	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'order_id':
			case '_shipping_first_name':
			case '_checked_in':
			case 'order_items':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = [
			'order_id' => 'ID',
			'_shipping_first_name' => 'Keresztnév',
			'_checked_in'      => 'Gyártásra felvéve',
			'order_items'      => 'Termékek'
		];

		return $columns;
	}


	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'order_id'     => array('order_id',false),
			'_checked_in'    => array('_checked_in',false)
		);

		return $sortable_columns;
	}


	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->_column_headers = $this->get_column_info();


		$per_page     = $this->get_items_per_page( 'orders_per_page', 5 );
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count();

		$this->set_pagination_args( [
			'total_items' => $total_items, //WE have to calculate the total number of items
			'per_page'    => $per_page //WE have to determine how many items to show on a page
		] );

		$this->items = self::get_orders( $per_page, $current_page );
	}


}


class Order_Plugin {

	// class instance
	static $instance;

	// order WP_List_Table object
	public $orders_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
	}


	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {

		$hook = add_menu_page(
			'Order List Table',
			'Order List Table',
			'manage_options',
			'wp_list_table_class',
			[ $this, 'plugin_settings_page' ]
		);

		add_action( "load-$hook", [ $this, 'screen_option' ] );

	}


	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page() {
		?>
		<div class="wrap">
			<h2>Order List Table</h2>

			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form method="post">
								<?php
								$this->orders_obj->prepare_items();
								$this->orders_obj->display(); ?>
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>


	<?php
	}

	/**
	 * Screen options
	 */
	public function screen_option() {

		$option = 'per_page';
		$args   = [
			'label'   => 'orders',
			'default' => 5,
			'option'  => 'orders_per_page'
		];

		add_screen_option( $option, $args );

		$this->orders_obj = new Orders_List();
	}


	/** Singleton instance */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}


add_action( 'plugins_loaded', function () {
	Order_Plugin::get_instance();
} );
