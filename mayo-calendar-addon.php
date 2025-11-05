<?php
/**
 * Plugin Name: Mayo Calendar Addon
 * Plugin URI: https://github.com/bmlt-enabled/mayo-calendar-addon
 * Description: Adds FullCalendar view support to Mayo Events Manager
 * Version: 1.0.0
 * Author: BMLT Enabled
 * Author URI: https://bmlt.app
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mayo-calendar-addon
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

namespace BmltEnabled\MayoCalendar;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MAYO_CALENDAR_VERSION', '1.0.0' );
define( 'MAYO_CALENDAR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MAYO_CALENDAR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

class MayoCalendarAddon {
	public static function init() {
		// Check if Mayo Events Manager is active
		add_action( 'admin_init', [ __CLASS__, 'check_dependencies' ] );

		// Initialize addon
		add_action( 'plugins_loaded', [ __CLASS__, 'load_addon' ] );
	}

	public static function check_dependencies() {
		if ( ! is_plugin_active( 'mayo/mayo-events-manager.php' ) ) {
			add_action(
				'admin_notices',
				function () {
					?>
				<div class="notice notice-error">
					<p>
						<?php _e( 'Mayo Calendar Addon requires Mayo Events Manager to be installed and activated.', 'mayo-calendar-addon' ); ?>
					</p>
				</div>
					<?php
				}
			);
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	}

	public static function load_addon() {
		// Only load if Mayo is active
		if ( ! class_exists( 'BmltEnabled\\Mayo\\Frontend' ) ) {
			return;
		}

		// Add calendar shortcode
		add_shortcode( 'mayo_event_calendar', [ __CLASS__, 'render_calendar' ] );

		// Enqueue scripts
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
	}

	public static function render_calendar( $atts = [] ) {
		static $instance = 0;
		$instance++;

		$defaults = [
			'initial_view' => 'dayGridMonth',
			'height' => 'auto',
			'timezone' => 'local',
			'categories' => '',
			'tags' => '',
			'event_type' => '',
			'status' => 'publish',
			'service_body' => '',
			'source_ids' => '',
		];
		$atts = shortcode_atts( $defaults, $atts );

		wp_enqueue_script( 'mayo-calendar-addon' );
		wp_enqueue_style( 'mayo-calendar-addon' );

		$settings_key = "mayoCalendarSettings_$instance";
		wp_localize_script(
			'mayo-calendar-addon',
			$settings_key,
			[
				'initialView' => $atts['initial_view'],
				'height' => $atts['height'],
				'timezone' => $atts['timezone'],
				'categories' => $atts['categories'],
				'tags' => $atts['tags'],
				'eventType' => $atts['event_type'],
				'status' => $atts['status'],
				'serviceBody' => $atts['service_body'],
				'sourceIds' => $atts['source_ids'],
			]
		);

		return sprintf(
			'<div id="mayo-event-calendar-%d" class="mayo-calendar-addon" data-instance="%d"></div>',
			$instance,
			$instance
		);
	}

	public static function enqueue_scripts() {
		$post = get_post();
		$should_enqueue = false;

		if ( $post && has_shortcode( $post->post_content, 'mayo_event_calendar' ) ) {
			$should_enqueue = true;
		}

		if ( $should_enqueue ) {
			wp_enqueue_script(
				'mayo-calendar-addon',
				MAYO_CALENDAR_PLUGIN_URL . 'assets/js/dist/calendar.bundle.js',
				[ 'wp-element', 'wp-components' ],
				MAYO_CALENDAR_VERSION,
				true
			);

			wp_enqueue_style(
				'mayo-calendar-addon',
				MAYO_CALENDAR_PLUGIN_URL . 'assets/css/calendar.css',
				[],
				MAYO_CALENDAR_VERSION
			);

			// Make sure Mayo API settings are available
			if ( ! wp_script_is( 'mayo-public', 'enqueued' ) ) {
				wp_localize_script(
					'mayo-calendar-addon',
					'mayoApiSettings',
					[
						'root' => esc_url_raw( rest_url() ),
						'nonce' => wp_create_nonce( 'wp_rest' ),
					]
				);
			}
		}
	}
}

MayoCalendarAddon::init();
