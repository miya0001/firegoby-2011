<?php

add_action('after_setup_theme', 'firegoby_setup', 9999);

function firegoby_setup(){
    remove_theme_support('custom-header');
    remove_custom_image_header();
    wp_deregister_script( 'jquery' );
    wp_register_script(
        'jquery',
        'http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js',
        false,
        null,
        true
    );
    wp_register_script(
        'jquery-jparallax',
        get_bloginfo("stylesheet_directory").'/js/jquery.jparallax.js',
        array('jquery'),
        '0.9.9',
        true
    );
    wp_register_script(
        'firegoby',
        get_bloginfo("stylesheet_directory").'/js/firegoby.js',
        array('jquery-jparallax'),
        '20111122',
        true
    );
    wp_enqueue_script('firegoby');
}

// eof
