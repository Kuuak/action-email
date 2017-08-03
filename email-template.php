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
	}
}

$orfeve_shotcodes = new Email_Template();
