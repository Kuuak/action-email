<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package		Email_Template
 * @author		Felipe Paul Martins
 * @license		GPL-3.0+
 * @link			https://github.com/Kuuak/email-template
 */

	// If uninstall not called from WordPress, then exit.
	if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
		exit;
	}
