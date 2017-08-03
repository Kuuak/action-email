<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Kuuak/email-template
 * @since      1.0.0
 *
 * @package    Email_Template
 * @subpackage Email_Template/admin
 */

/* Prevent loading this file directly */
defined( 'ABSPATH' ) || exit;

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Email_Template
 * @subpackage Email_Template/adminc
 * @author     Felipe Paul Martins
 */
if ( !class_exists( 'Email_Template_admin' ) ) {

	/**
	 * Class Email_Template_admin
	 * @since	1.0.0
	 */
	class Email_Template_admin {

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since		1.0.0
		 */
		public function __construct() {

			$this->load_dependencies();
		}

		private function load_dependencies() {

			$this->template_cpt = require_once 'class-email-template-cpt.php';
		}

	}
}

new Email_Template_admin();
