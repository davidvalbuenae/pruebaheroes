<?php

// Create custom settings menu
add_action('admin_menu', 'sh_api_create_menu');

function sh_api_create_menu() {
    //create api settings super hero.
    add_menu_page('Super Heroes API Configuraciones', 'Super heroes API', 'administrator', 'config-sh-api', 'sh_api_settings_page' , 'dashicons-admin-generic' );
    //create menu info
    add_submenu_page('config-sh-api', 'Información', 'Información', 'administrator', 'info-sh', 'info_sh_settings_page');
    //call register settings function
    add_action( 'admin_init', 'register_post_plugin_settings' );
}

function sh_custom_admin_style() {
    wp_enqueue_style('admin-api-sh', plugin_dir_url( __FILE__ ) . '../css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'sh_custom_admin_style' );

function register_post_plugin_settings() {
    //register our settings
    register_setting( 'sh-settings-group', 'sh_id_json' );
}

function sh_api_settings_page(){
    include_once plugin_dir_path(__FILE__) . '../views/panel-admin.php';
}

function info_sh_settings_page(){
    include_once plugin_dir_path(__FILE__) . '../views/panel-admin-info-sh.php';
}