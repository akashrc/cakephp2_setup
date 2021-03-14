<?php
/**
 * Plugin Name: iFlexRTS SPA
 * Plugin URI: https://github.com/oddjobz/spa
 * Description: This plugin turns your website into a Single Page Application (SPA)
 * Version: 0.9.0
 * Author: Gareth Bult
 * Author URI: https://gareth.bult.co.uk
 * License: MIT
 */

function inject_spa() {
    wp_enqueue_script(
        'load_spa',
        plugins_url('js/iflex_spa.js', __FILE__),
        array('jquery')
    );  
}
add_action('wp_enqueue_scripts', inject_spa);
