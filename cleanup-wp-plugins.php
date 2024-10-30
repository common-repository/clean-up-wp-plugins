<?php
/*
 * Plugin Name: Clean Up WordPress Plugins
 * Plugin URI: https://github.com/dolatabadi/cleanup-wp-plugins
 * Description: Clean up WordPress plugins from promotional banners, donation links, newsletter and unnecessary messages.
 * Version: 1.0.3
 * Author: Dolatabadi
 * Text Domain: clean-up-wp-plugins
 * Domain Path: /languages
 * Author URI: https://github.com/dolatabadi
 * License: GNU General Public License v2
 */

/**
 * Loading language files.
 */
function cleanup_wp_plugins_textdomain() {
	load_plugin_textdomain( 'clean-up-wp-plugins', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'cleanup_wp_plugins_textdomain' );

/**
 * Register a custom menu page.
 */
function cleanup_wp_plugins_menu() {
	add_options_page(
		'Clean Up WP Plugins',
		'Clean Up WP Plugins',
		'manage_options',
		'cleanup-wp-plugins.php',
		'cleanup_wp_plugins_options_page'
	);
}

add_action( 'admin_menu', 'cleanup_wp_plugins_menu' );

/**
 * Create The Option Page
 */
function cleanup_wp_plugins_options_page() {
	?>
    <div class="wrap">
        <h1><?php _e( 'Clean Up WordPress Plugins', 'clean-up-wp-plugins' ); ?></h1>
        <!-- Description of the plugin -->
        <div class="card">
            <h2 class="title"><?php _e( 'Description', 'clean-up-wp-plugins' ); ?></h2>
            <p><?php _e( 'This is a simple plugin which once activated removes (hides) promotional banners, donation buttons, newsletter forms, and unnecessary messages from popular WordPress plugins.', 'clean-up-wp-plugins' ); ?></p>
            <hr>
            <h3><?php _e( 'List of Supported Plugins', 'clean-up-wp-plugins' ); ?></h3>
            <p><?php _e( 'Currently the following plugins are cleaned up:', 'clean-up-wp-plugins' ); ?></p>
            <!-- list of supported plugins -->
            <div class="plugins-list">
                <ul id="triple">
                    <li>All in One SEO Pack</li>
                    <li>Category Order</li>
                    <li>Custom Post Type UI</li>
                    <li>Google Analytics</li>
                    <li>Google XML Sitemaps</li>
                    <li>MailChimp for WordPress</li>
                    <li>Meta Slider</li>
                    <li>Ninja Forms</li>
                    <li>Popups - WordPress Popup</li>
                    <li>Post Type Orders</li>
                    <li>Responsive Lightbox</li>
                    <li>Taxonomy Terms Order</li>
                    <li>User Role Editor</li>
                    <li>WordPress Popular Posts</li>
                    <li>WP User Avatar</li>
                    <li>WP Subscribe</li>
                    <li>Yoast SEO</li>
                    <li>WP Smush</li>
                </ul>
            </div>
        </div>
        <!-- Submit a plugin -->
        <div class="card">
            <h2 class="title"><?php _e( 'Submit a Plugin for Clean Up', 'clean-up-wp-plugins' ); ?></h2>
            <p><?php _e( 'If a plugin contains many banners and promotional links, you can submit it for consideration. Once your request is accepted, the plugin will be added in future releases.', 'clean-up-wp-plugins' ); ?></p>
            <!-- Link to submit a request -->
            <a href="https://github.com/dolatabadi/cleanup-wp-plugins/issues" target="_blank">
                <button id="save_menu_footer"
                        class="button button-primary menu-save"><?php _e( 'Submit Your Requests', 'cleanup-wp-plugins' ); ?></button>
            </a>
            <p><?php _e( '<strong>Note: </strong>Please only request plugins which are available through WordPress official plugins directory.', 'clean-up-wp-plugins' ); ?></p>
        </div>
        <!-- Supporting the authors-->
        <div class="card">
            <h2 class="title"><?php _e( 'Please Consider Supporting Developers', 'clean-up-wp-plugins' ); ?></h2>
            <p><?php _e( 'The purpose of this plugin is to make option pages look simpler by allowing users to remove/hide promotional banners and unnecessary messages. Please consider supporting your favourit plugins by donating or purchasing the pro versions.', 'clean-up-wp-plugins' ); ?></p>
            <p><?php _e( 'This plugin does not discourage users from supporting these plugins, in fact, if you like a plugin it is highly recommended that you leave a review, or donate to support the development of those plugins.', 'clean-up-wp-plugins' ); ?></p>
        </div>
    </div>
	<?php
}

/**
 * Add settings link to the plugin
 */
function cleanup_wp_plugins_add_settings_link( $links ) {
	$cleanup_settings_link = '<a href="options-general.php?page=cleanup-wp-plugins">' . __( 'Settings' ) . '</a>';
	array_push( $links, $cleanup_settings_link );

	return $links;
}

$cleanup_plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$cleanup_plugin", 'cleanup_wp_plugins_add_settings_link' );

/**
 * Adding custom style
 */
function cleanup_wp_plugins_style() {
	wp_enqueue_style( 'cleanup', plugins_url( 'css/cleanup.css', __FILE__ ) );
}

add_action( 'admin_enqueue_scripts', 'cleanup_wp_plugins_style', 20 );
add_action( 'login_enqueue_scripts', 'cleanup_wp_plugins_style', 20 );
?>
