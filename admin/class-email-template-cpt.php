<?php
/**
 * Register the Email template Custom Post Type.
 *
 * @link       https://github.com/Kuuak/email-template
 * @since      1.0.0
 *
 * @package    Email_Template
 * @subpackage Email_Template/admin/template
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( !class_exists( 'Email_Template_CPT' ) ) {

	final class Email_Template_CPT {
		private static $loaded = false;

		function __construct() {
			if ( self::$loaded ) return;

			define( 'EMAIL_TEMPLATE_CPT', 'email_template_cpt' );

			add_action( 'init', array( $this, 'register_post_type' ), 11 );

			self::$loaded = true;
		}

		/**
		 * Register email template post type
		 */
		function register_post_type() {

			register_post_type( EMAIL_TEMPLATE_CPT,
				array(
					'labels'							=> array(
						'name'								=> __( 'Templates', 'email-template' ),
						'menu_name'						=> __( 'Email templates', 'email-template' ),
						'singular_name'				=> __( 'Email template', 'email-template' ),
						'add_new_item'				=> __( 'Add a templates', 'email-template' ),
						'all_items'						=> __( 'Templates', 'email-template' ),
						'view_item'						=> __( 'View template', 'email-template' ),
						'add_new'							=> __( 'Add new', 'email-template' ),
						'edit_item'						=> __( 'Edit template', 'email-template' ),
						'update_item'					=> __( 'Update template', 'email-template' ),
						'search_items'				=> __( 'Search a template', 'email-template' ),
						'not_found'						=> __( 'No template found', 'email-template' ),
						'not_found_in_trash'	=> __( 'No template found in trash', 'email-template' ),
					),
					'description'					=> __( 'Define email templates.', 'email-template' ),
					'public'							=> false,
					'exclude_from_search'	=> true,
					'publicly_queryable'	=> false,
					'show_ui'							=> true,
					'show_in_nav_menus'		=> false,
					'has_archive'					=> false,
					'capability_type'			=> 'page',
					'map_meta_cap'				=> true,
					'show_in_admin_bar'		=> true,
					'menu_position'				=> 50,
					'supports'						=> array(
						'title',
						'editor',
					),
					'menu_icon'						=> 'dashicons-email-alt',
					'hierarchical'				=> false,
					'query_var'						=> false,
					'rewrite'							=> false,
				)
			);
		}
	}
}

new Email_Template_CPT();
