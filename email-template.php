<?php
/**
 * Plugin Name:		Email Template
 * Description: 	Add Email template post type.
 * Author: 				Felipe Paul Martins
 * Author URI:		https://profiles.wordpress.org/kuuak
 * Version: 			1.0.0
 * License:				GPL-3.0+
 * License URI:		http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:		email-template
 * Domain Path:		/languages
 *
 * Email Template is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * Email Template is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package		Email_Template
 * @author		Felipe Paul Martins
 * @license		GPL-3.0+
 * @link			https://github.com/Kuuak/email-template
 */

/* Prevent loading this file directly */
defined( 'ABSPATH' ) || exit;

/**
 * Add default options on plugin activation.
 * @since 1.0.0
 */
function Email_Template_activate() {}
register_activation_hook( __FILE__, 'Email_Template_activate' );


if ( !class_exists( 'Email_Template' ) ) {

	/**
	 * Class Email_Template
	 * @since 1.0.0
	 */
	class Email_Template {

		/**
		 * The current version of the plugin.
		 *
		 * @since		1.0.0
		 * @access	protected
		 * @var			string	$version
		 */
		protected $version;

		/**
		 * The directory path of the plugin.
		 *
		 * @since		1.0.0
		 * @access	protected
		 * @var			string	$dir_path
		 */
		protected $dir_path;

		/**
		 * The directory URI of the plugin.
		 *
		 * @since		1.0.0
		 * @access	protected
		 * @var			string	$dir_uri
		 */
		protected $dir_uri;

		/**
		 * Class Constructor.
		 *
		 * @since		1.0.0
		 */
		public function __construct() {

			$this->version			= '1.0.0';
			$this->plugin_name	= 'email-template';
			$this->dir_path			= trailingslashit( plugin_dir_path( __FILE__ ) );
			$this->dir_uri			= trailingslashit( plugin_dir_url(  __FILE__ ) );

			$this->load_dependencies();
		}

		/**
		 * Load the plugin dependencies & specific classes
		 *
		 * @since		1.0.0
		 */
		private function load_dependencies() {

			$this->admin = require_once 'admin/class-email-template-admin.php';

		}

		/**
		 * Retrieve the name of the plugin
		 *
		 * @since		1.0.0
		 * @return	string	The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since		1.0.0
		 * @return	string	The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}

		/**
		 * Send an email according to the provided Template and Data
		 *
		 * @since		1.0.0
		 * @access	static
		 *
		 * @param		int			$template_if	The template to use as base for the email.
		 * @param		array		$data					The data to replace dynamic fields in the template.
		 * @return	bool									Whether or not the email was correctly sent.
		 */
		static function send( $template_id, $data ) {

			$template = get_post( $template_id );
			if ( empty( $template ) ) {
				return false;
			}

			$template = get_post( $template_id );

			$templates = array(
				'subject.twig'		=> get_field( 'subject', $template_id ),
				'recipient.twig'	=> get_field( 'recipient', $template_id ),
				'message.twig'		=> $template->post_content,
			);

			$tple_headers = get_field( 'headers', $template_id );
			foreach ( $tple_headers as $key => $value) {
				$templates[ "header_$key.twig" ] = $value['value'];
			}

			// Load Twig dependency
			require_once 'vendor/autoload.php';

			$loader = new Twig_Loader_Array($templates);

			//Initialize Twig templating
			$twig = new Twig_Environment( $loader );

			// Render the fields and headers
			$subject		= $twig->render( 'subject.twig', $data );
			$recipient	= $twig->render( 'recipient.twig', $data );
			$message		= $twig->render( 'message.twig', $data );

			for ($i=0; $i < count($tple_headers); $i++) {
				$headers[] = $twig->render( "header_$i.twig", $data );
			}

			// Retrieve non dynamic data and set the From header
			$sender				= get_field( 'sender', $template_id );
			$sender_name	= get_field( 'sender_name', $template_id );
			$headers[] = "From: $sender_name <$sender>";

			// Send email and return result
			return wp_mail( $recipient, $subject, $message, $headers );
		}
	}
}

$orfeve_shotcodes = new Email_Template();
