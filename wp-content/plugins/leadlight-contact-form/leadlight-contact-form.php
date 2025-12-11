<?php
/**
 * Plugin Name: LeadLight Contact Form
 * Description: Creates the contact submissions table.
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

// Create database table on plugin activation
function leadlight_create_contact_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'contact_submissions';
    $charset = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email text NOT NULL,
        message text NOT NULL,
        submitted_at datetime NOT NULL,
        PRIMARY KEY(id)
    ) $charset;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'leadlight_create_contact_table');
