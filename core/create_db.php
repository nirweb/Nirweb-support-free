<?php
//----------------- Ticket Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
                ticket_id  int(255) NOT NULL AUTO_INCREMENT,
                receiver_type  tinyint(4) NOT NULL,
                id_receiver  int(20) NOT NULL,
                subject  varchar(255) NOT NULL,
                content  text NOT NULL,
                department  varchar(255) NOT NULL,
                priority  tinyint(4) NOT NULL,
                website  varchar(255) NOT NULL,
                product  int(11) NOT NULL,
                support_id  int(11) NOT NULL,
                sender_id  int(11) NOT NULL,
                status  int(11) NOT NULL,
                date_qustion  datetime NOT NULL,
                time_update  datetime NOT NULL,
                file_url  varchar(255) NOT NULL,
                PRIMARY KEY (ticket_id)
            ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
});
//----------------- Answer Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket_answered';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
            answer_id int(9) NOT NULL AUTO_INCREMENT,
            user_id  int(255) NOT NULL,
            text  text NOT NULL,
            attach_url  varchar(255) NOT NULL,
            time_answer  datetime NOT NULL,
            ticket_id  int(255) NOT NULL,
            PRIMARY KEY  (answer_id)
                ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
});
//----------------- Department Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket_department';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
          department_id  int(9) NOT NULL AUTO_INCREMENT,
          name  varchar(255) NOT NULL,
          support_id  int(255) NOT NULL,
          PRIMARY KEY (department_id)
               ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
});
//----------------- User Upload Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket_user_upload';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
          id  int(255) NOT NULL AUTO_INCREMENT,
          url_file  varchar(255) NOT NULL,
          user_id  int(255) NOT NULL,
          file_id  int(255) NOT NULL,
          time_upload  datetime NOT NULL,
          PRIMARY KEY (id)
           ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
});
//----------------- FAQ Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket_faq';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
          id  int(255) NOT NULL AUTO_INCREMENT,
           question  varchar(255) NOT NULL,
           answer  text NOT NULL,
           department_id  int(255) NOT NULL,
          PRIMARY KEY (id)
           ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
});
 
//----------------- Priority Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket_priority';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
priority_id  int(255) NOT NULL AUTO_INCREMENT,
name  varchar(255) NOT NULL,
PRIMARY KEY (priority_id)
) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        $wpdb->query(
            "INSERT INTO  $table_name
       ( priority_id, name )
       VALUES ( 1, 'low' )"
        );
        $wpdb->query(
            "INSERT INTO  $table_name
       ( priority_id, name )
       VALUES ( 2, 'normal')"
        );
        $wpdb->query(
            "INSERT INTO  $table_name
       ( priority_id, name )
       VALUES ( 3, 'necessary')"
        );
    }
});
//----------------- Status Datbase
add_action('init', function () {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nirweb_ticket_ticket_status';
    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
    if ($wpdb->get_var($query) != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
status_id  int(255) NOT NULL AUTO_INCREMENT,
name_status  varchar(255) NOT NULL,
PRIMARY KEY (status_id)
) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        $wpdb->query("INSERT INTO  $table_name
( status_id, name_status )
VALUES ( 1, 'New' )");
        $wpdb->query("INSERT INTO  $table_name
( status_id, name_status )
VALUES ( 2, 'Inprogress' )");
        $wpdb->query("INSERT INTO  $table_name
( status_id, name_status )
VALUES ( 3, 'Answerede' )");
        $wpdb->query("INSERT INTO  $table_name
( status_id, name_status )
VALUES ( 4, 'Closed' )");
    }
});