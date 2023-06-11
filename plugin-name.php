<?php

/**
* Plugin Name: Plugin Name
* Plugin URI: https://www.wordpress.org/ht-testimonials
* Description: My plugin's description
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Heriberto Torres
* Author URI: https://heribertotorres.com
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ht-testimonials
* Domain Path: /languages
*/
/*
Plugin Name is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Plugin Name is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Plugin Name. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'Plugin_Name' ) ){

    class Plugin_Name{

        public function __construct() {

            // Define constants used througout the plugin
            $this->define_constants();           

        }

         /**
         * Define Constants
         */
        public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
            define ( 'Plugin_Name_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'Plugin_Name_URL', plugin_dir_url( __FILE__ ) );
            define ( 'Plugin_Name_VERSION', '1.0.0' );     
        }

        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );
        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }

    }
}

if( class_exists( 'Plugin_Name' ) ){
    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'Plugin_Name', 'activate'));
    register_deactivation_hook( __FILE__, array( 'Plugin_Name', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'Plugin_Name', 'uninstall' ) );

    $plugin_name = new Plugin_Name();
}