<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access allowed
}
require_once NIRWEB_SUPPORT_TICKET . 'core/create_db.php';
require_once NIRWEB_SUPPORT_INC_ADMIN_TICKET . 'functions/scripts.php';
require_once NIRWEB_SUPPORT_INC_ADMIN_TICKET . 'functions/ajax.php';
require_once NIRWEB_SUPPORT_INC_USER_FUNCTIONS_TICKET . 'func_shourt_code.php';
// ---------- Styles And JS Files --------------------
add_action(
	'wp_enqueue_scripts',
	function () {
		$size = sanitize_text_field( get_option('size_of_file_wpyartik') );
		wp_enqueue_style( 'font5-css-wpyt', NIRWEB_SUPPORT_URL_TICKET . 'assets/css/all.min.css' );
		if ( is_rtl() ) {
			wp_enqueue_style( 'user-css-wpyt', NIRWEB_SUPPORT_URL_TICKET . 'assets/css/user-rtl.css' );
		} else {
			wp_enqueue_style( 'user-css-wpyt', NIRWEB_SUPPORT_URL_TICKET . 'assets/css/user.css' );
		}
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'user-js-file', NIRWEB_SUPPORT_URL_TICKET . 'assets/js/user.js' );
		wp_localize_script(
			'user-js-file',
			'wpyarticket',
			array(
				'upload_url'          => admin_url( 'async-upload.php' ),
				'ajax_url'            => admin_url( 'admin-ajax.php' ),
				'nonce'               => wp_create_nonce( 'media-form' ),
				'reset_form_title'    => esc_html__( 'Are you sure you want to reset?', 'nirweb-support' ),
				'reset_form_subtitle' => esc_html__( 'This will cause data loss.', 'nirweb-support' ),
				'reset_form_success'  => esc_html__( 'Form successfully reset.', 'nirweb-support' ),
				'attach_file'         => esc_html__( 'Attachment File', 'nirweb-support' ),
				'recv_info'           => esc_html__( 'Receiving information ...', 'nirweb-support' ),
				'nes_field'           => esc_html__( 'complete all stared sections Please', 'nirweb-support' ),
				'max_size_file'       => esc_html__( "maximum Size Of File $size MB", 'nirweb-support' ),
				'nvalid_file'         => esc_html__( 'File is not valid.', 'nirweb-support' ),
				'necessary'           => esc_html__( 'necessary', 'nirweb-support' ),
				'normal'              => esc_html__( 'normal', 'nirweb-support' ),
				'low'                 => esc_html__( 'low', 'nirweb-support' ),
				'new'                 => esc_html__( 'new', 'nirweb-support' ),
				'inprogress'          => esc_html__( 'inprogress', 'nirweb-support' ),
				'answerede'           => esc_html__( 'answerede', 'nirweb-support' ),
				'closed'              => esc_html__( 'closed', 'nirweb-support' ),
				'ok_text'             => esc_html__( 'Ok', 'nirweb-support' ),
				'cancel_text'         => esc_html__( 'Cancel', 'nirweb-support' ),
			)
		);
	}
);
// ~~~~~~~~~~~~START Create Menu~~~~~~~~~~
add_action(
	'admin_menu',
	function () {
		require_once NIRWEB_SUPPORT_TICKET . 'inc/admin/functions/func_number_tab_ticktes.php';
		if ( current_user_can( 'administrator' ) ) {
			$scount = nirweb_ticket_count_new_ticket();
		} else {
			$scount = nirweb_ticket_count_new_ticket_posht( get_current_user_id() );
		}
		$count_html = sprintf( '<span class="update-plugins update-count">%d</span>', $scount, number_format_i18n( $scount ) );

		add_menu_page(
			esc_html__( 'Tickets', 'nirweb-support' ),
			esc_html__( 'Tickets', 'nirweb-support' ) . $count_html,
			'upload_files',
			'nirweb_ticket_manage_tickets',
			'nirweb_ticket_manage_tickets_callback',
			'dashicons-tickets',
			8
		);
		add_submenu_page(
			'nirweb_ticket_manage_tickets&tab=all_ticket',
			esc_html__( 'All tickets', 'nirweb-support' ),
			esc_html__( 'All tickets', 'nirweb-support' ),
			'upload_files',
			'nirweb_ticket_manage_tickets&tab=all_ticket',
			'nirweb_ticket_manage_tickets_callback'
		);
		add_submenu_page(
			'nirweb_ticket_manage_tickets',
			esc_html__( 'Send ticket', 'nirweb-support' ),
			esc_html__( 'Send ticket', 'nirweb-support' ),
			'upload_files',
			'nirweb_ticket_send_ticket',
			'nirweb_ticket_send_ticket_callback'
		);
		add_submenu_page(
			'nirweb_ticket_manage_tickets',
			esc_html__( 'Department', 'nirweb-support' ),
			esc_html__( 'Department', 'nirweb-support' ),
			'manage_options',
			'nirweb_ticket_department_ticket',
			'nirweb_ticket_department_ticket_callback'
		);
		add_submenu_page(
			'nirweb_ticket_manage_tickets',
			esc_html__( 'Pre answer', 'nirweb-support' ),
			esc_html__( 'Pre answer', 'nirweb-support' ),
			'manage_options',
			'edit.php?post_type=pre_answer_wpyticket'
		);
		add_submenu_page(
			'nirweb_ticket_manage_tickets',
			esc_html__( 'FAQ', 'nirweb-support' ),
			esc_html__( 'FAQ', 'nirweb-support' ),
			'manage_options',
			'nirweb_ticket_FAQ_ticket',
			'nirweb_ticket_FAQ_ticket_callback'
		);
		add_submenu_page(
			'nirweb_ticket_manage_tickets',
			esc_html__( 'List of uploaded files', 'nirweb-support' ),
			esc_html__( 'List of uploaded files', 'nirweb-support' ),
			'manage_options',
			'nirweb_ticket_uploads_file',
			'nirweb_ticket_uploads_file_func'
		);
        add_submenu_page(
			'nirweb_ticket_manage_tickets',
			esc_html__( 'Settings', 'nirweb-support' ),
			esc_html__( 'Settings', 'nirweb-support' ),
			'manage_options',
			'nirweb_ticket_settings',
			'nirweb_ticket_settings_func'
		);

	}
);
add_action('admin_init', function ()
{

    register_setting('nirweb_ticket-settings-group', 'display_icon_send_ticket',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'select_page_ticket',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'icon_nirweb_ticket_front',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'position_icon_nirweb_ticket_front',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'template_send_ticket_email',['sanitize_callback'=>'wp_kses_post']);
    register_setting('nirweb_ticket-settings-group', 'active_send_mail_to_poshtiban',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'active_send_mail_to_user',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'subject_mail_poshtiban_new',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'poshtiban_text_email_send',['sanitize_callback'=>'wp_kses_post']);
    register_setting('nirweb_ticket-settings-group', 'subject_mail_poshtiban_answer',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'poshtiban_text_email_send_answer',['sanitize_callback'=>'wp_kses_post']);
    register_setting('nirweb_ticket-settings-group', 'subject_mail_user_new',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'user_text_email_send',['sanitize_callback'=>'wp_kses_post']);
    register_setting('nirweb_ticket-settings-group', 'subject_mail_user_answer',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'user_text_email_send_answer',['sanitize_callback'=>'wp_kses_post']);
    register_setting('nirweb_ticket-settings-group', 'require_procut_user_wpyar',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'text_top_send_mail_nirweb_ticket',['sanitize_callback'=>'wp_kses_post']);
    register_setting('nirweb_ticket-settings-group', 'size_of_file_wpyartik',['sanitize_callback'=>'sanitize_text_field']);
    register_setting('nirweb_ticket-settings-group', 'mojaz_file_upload_user_wpyar',['sanitize_callback'=>'sanitize_text_field']);
});

function nirweb_ticket_uploads_file_func(){
	require_once NIRWEB_SUPPORT_INC_ADMIN_THEMES_TICKET . 'file_uploads.php';
}
function nirweb_ticket_settings_func(){
	require_once NIRWEB_SUPPORT_TICKET . 'core/settings.php';
}

if ( ! function_exists( 'nirweb_ticket_manage_tickets_callback' ) ) {
	function nirweb_ticket_manage_tickets_callback() {
		require_once NIRWEB_SUPPORT_INC_ADMIN_THEMES_TICKET . 'manage_tickets.php';
	}
}
if ( ! function_exists( 'nirweb_ticket_send_ticket_callback' ) ) {
	function nirweb_ticket_send_ticket_callback() {
		 require_once NIRWEB_SUPPORT_INC_ADMIN_THEMES_TICKET . 'ticket.php';
	}
}
if ( ! function_exists( 'nirweb_ticket_department_ticket_callback' ) ) {
	function nirweb_ticket_department_ticket_callback() {
		require_once NIRWEB_SUPPORT_INC_ADMIN_THEMES_TICKET . 'department.php';
	}
}
if ( ! function_exists( 'nirweb_ticket_PreAnswer_ticket_callback' ) ) {
	function nirweb_ticket_PreAnswer_ticket_callback() {
		require_once NIRWEB_SUPPORT_INC_ADMIN_THEMES_TICKET . 'pre_answer.php';
	}
}
if ( ! function_exists( 'nirweb_ticket_FAQ_ticket_callback' ) ) {
	function nirweb_ticket_FAQ_ticket_callback() {
		require_once NIRWEB_SUPPORT_INC_ADMIN_THEMES_TICKET . 'FAQ.php';
	}
}

add_action(
	'init',
	function () {
		$role = add_role(
			'user_support',
			esc_html__( 'Support', 'nirweb-support' ),
			array(
				'read'         => true,
				'upload_files' => true,
			)
		);
		$role = get_role( 'user_support' );
		$role->add_cap( 'upload_files' );
		$role->add_cap( 'delete_posts' );
		$role->add_cap( 'edit_posts' );
		remove_role( 'support_moderator' );
	}
);

// ~~~~~~~~~~~~END Action Create Roles~~~~~~
add_action(
	'admin_menu',
	function () {
		if ( current_user_can( 'user_support' ) ) {
			remove_menu_page( 'edit.php' );
			remove_menu_page( 'edit-comments.php' );
			remove_menu_page( 'tools.php' );
		}
	}
);

add_action(
	'admin_bar_menu',
	function ( $wp_admin_bar ) {
		if ( current_user_can( 'user_support' ) ) {
			$wp_admin_bar->remove_node( 'new-post' );
		}
	},
	999
);

// ~~~~~~~~~~~~START Create Post type Pre Answer~~~~~~
add_action(
	'init',
	function () {
		$labels = array(
			'name'          => esc_html__( 'pre answer', 'nirweb-support' ),
			'singular_name' => esc_html__( 'pre answer', 'nirweb-support' ),
			'add_new'       => esc_html__( 'New Answer', 'nirweb-support' ),
			'add_new_item'  => esc_html__( 'New Answer', 'nirweb-support' ),
			'edit_item'     => esc_html__( 'Edit Answer', 'nirweb-support' ),
			'new_item'      => esc_html__( 'New Answer', 'nirweb-support' ),
			'all_items'     => esc_html__( 'pre answer', 'nirweb-support' ),
			'view_item'     => esc_html__( 'Show Answer', 'nirweb-support' ),
			'menu_name'     => esc_html__( 'pre answer', 'nirweb-support' ),
		);
		$args   = array(
			'labels'             => $labels,
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'query_var'          => false,
			'rewrite'            => array( 'slug' => false ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'supports'           => array( 'title', 'editor', 'revisions' ),
			'show_in_menu'       => false,
		);
		register_post_type( 'pre_answer_wpyTicket', $args );
	},
	20
);
// ~~~~~~~~~~~~END Post type Pre Answer~~~~~~
// ~~~~~~~~~~~~Start Add Page Ticket To My Account ~~~~~~
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	class nirweb_ticket_My_Account_Endpoint {

		public static $endpoint = 'wpyar-ticket';
		public function __construct() {
            add_action( 'init', array( $this, 'add_endpoints' ) );
			add_filter( 'query_vars', array( $this, 'add_query_vars' ), 0 );
			add_filter( 'the_title', array( $this, 'endpoint_title' ) );
			add_filter( 'woocommerce_account_menu_items', array( $this, 'new_menu_items' ) );
			add_action( 'woocommerce_account_' . self::$endpoint . '_endpoint', array( $this, 'endpoint_content' ) );
		}

		public function add_endpoints() {
			add_rewrite_endpoint( self::$endpoint, EP_ROOT | EP_PAGES );
		}

		public function add_query_vars( $vars ) {
			$vars[] = self::$endpoint;
			return $vars;
		}

		public function endpoint_title( $title ) {
			global $wp_query;
			$is_endpoint = isset( $wp_query->query_vars[ self::$endpoint ] );
			if ( $is_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
				$title = esc_html__( 'Support Ticket', 'nirweb-support' );
				remove_filter( 'the_title', array( $this, 'endpoint_title' ) );
			}
			return $title;
		}

		public function new_menu_items( $items ) {
			$logout = $items['customer-logout'];
			unset( $items['customer-logout'] );
			$items[ self::$endpoint ] = esc_html__( 'Support Ticket', 'nirweb-support' );
			$items['customer-logout'] = $logout;
			return $items;
		}

		public function endpoint_content() {
			if ( isset( $_GET['action'] ) && ! empty( $_GET['action']) ) {
				if ( $_GET['action']  == 'new' ) {
					require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'new_ticket.php';
				} elseif (  $_GET['action']   == 'reply' ) {
					require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'replay_ticket.php';
				}
			} else {
				require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'home.php';
			}
		}
		public static function install() {
			flush_rewrite_rules();
		}
	}
	new nirweb_ticket_My_Account_Endpoint();
	register_activation_hook( __FILE__, array( 'nirweb_ticket_My_Account_Endpoint', 'install' ) );
}
// ~~~~~~~~~~~~END Add Page Ticket To My Account ~~~~~~~~~~
// ~~~~~~~~~~~~ Start ShortCode ~~~~~~
add_shortcode(
	'nirweb_ticket',
	function () {
		if ( is_user_logged_in() ) {
			if ( isset( $_GET['action'] ) && $_GET['action'] == 'new' ) {
				require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'new_ticket.php';
			} elseif ( isset( $_GET['action'] ) &&  $_GET['action'] == 'reply' ) {
				require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'replay_ticket.php';
			} else {
				require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'home.php';
			}
		}
	}
);


add_shortcode(
	'nirweb_ticket_new',
	function () {
		require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'new_ticket.php';
	}
);

add_shortcode(
	'nirweb_ticket_rep',
	function () {
		require_once NIRWEB_SUPPORT_INC_USER_THEMES_TICKET . 'replay_ticket.php';
	}
);
// --- ~~~~~~~~~~~~ END ShortCode ~~~~~~~~~~~~~
if ( get_option('display_icon_send_ticket') ) {
	add_action(
		'wp_footer',
		function () { ?>
			<?php
			if ( is_plugin_active( 'wpyar_panel/wpyar_panel.php' ) ) {
				$page = get_bloginfo( 'url' ) . '/' . get_post_field( 'post_name', op_wpyar_panel['page_wpyarud_plugin'] ) . '?endp=nirweb-ticket';
			} else {
				if ( get_option('select_page_ticket') ) {
					$page = esc_url_raw( get_page_link( get_option('select_page_ticket') ) );
				} else {
					$page = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) . 'wpyar-ticket/';
				}
			}
			?>

		<a class="nirweb_ticket_logo" href="<?php echo esc_html( esc_attr($page) ); ?>"
           style="<?=  wp_strip_all_tags(get_option('position_icon_nirweb_ticket_front')) == 'left' ? 'left:0' : 'right:0'  ?>">
			<img class="logo_ticket_wpyar" src="
			<?php if ( get_option('icon_nirweb_ticket_front')) { echo esc_url_raw( get_option('icon_nirweb_ticket_front') );
			} else { echo NIRWEB_SUPPORT_URL_TICKET . 'assets/images/defualt-logo.png'; } ?> " alt="<?php bloginfo( 'name' ); ?>"/>
		</a>
		<style>
			.nirweb_ticket_logo { position: fixed; bottom: 0; z-index: 9; }
		</style>
			<?php
		},
		100
	);
 }
// ----------- Add Number Ticket in Admin Bar
require_once NIRWEB_SUPPORT_TICKET . 'inc/admin/functions/func_number_tab_ticktes.php';
add_action(
	'admin_bar_menu',
	function ( $wp_admin_bar ) {
		if ( current_user_can( 'administrator' ) ) {
			$scount = nirweb_ticket_count_new_ticket();
		} else {
			$scount = nirweb_ticket_count_new_ticket_posht( get_current_user_id() );
		}
		if ( $scount > 0 ) {
			$args = array(
				'id'    => 'New_ticket',
				'title' => '<p style="background:red;color:#fff;padding:0 5px;"> ' . esc_html__( 'Count New Ticket', 'nirweb-support' ) . esc_html($scount) . '</p>',
                    'href'  => get_bloginfo( 'url' ) . '/wp-admin/admin.php?page=nirweb_ticket_manage_tickets&tab=new_ticket',
                    'meta'  => array(
                        'class' => 'New_ticket',
                        'title' => esc_html__( 'New Ticket', 'nirweb-support' ),
                    ),
			);
			$wp_admin_bar->add_node( $args );
		}
	},
	999
);
// --------------- Filter Media
add_filter(
	'ajax_query_attachments_args',
	function ( $query = array() ) {
		$user_id = get_current_user_id();
		if ( $user_id ) {
			$query['user_support'] = $user_id;
		}
		return $query;
	}, 10, 1
);

// --------------- Timr Ago
if ( ! function_exists( 'ago_ticket_nirweb' ) ) {
	function ago_ticket_nirweb( $post_date ) {
		echo  human_time_diff( esc_html($post_date), strtotime( current_time( 'Y-m-d H:i:s' ) ) ) . esc_html__( ' ago', 'nirweb-support' );
	}
}
