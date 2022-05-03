<?php 
/*
Plugin Name: Prueba Heroes
Plugin URI:
Description: Add functions prueba australiaveta
Version: 1.0
Author: David Fabian Valbuena Enciso
Author URI: https://dev-portafolio-david-valbuena.pantheonsite.io/
Licence: GLP2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Require files code
require_once plugin_dir_path(__FILE__) . '/admin/admin.php';
require_once plugin_dir_path(__FILE__) . '/includes/Superhero.php';


function sh_front_scripts() {
    wp_enqueue_style('api-sh-front', plugin_dir_url( __FILE__ ) . '/css/styles.css');
}
add_action( 'wp_enqueue_scripts', 'sh_front_scripts' );