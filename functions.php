<?php

new firegoby();

class firegoby {

function __construct()
{
    add_action(
        'after_setup_theme',
        array(&$this, "after_setup_theme"),
        9999
    );
}

public function after_setup_theme()
{
    remove_theme_support('custom-header');
    remove_custom_image_header();

    if (!is_admin()) :
    wp_deregister_script( 'jquery' );
    wp_register_script(
        'jquery',
        'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js',
        false,
        null,
        true
    );
    wp_register_script(
        'jquery-jparallax',
        get_bloginfo("stylesheet_directory").'/js/jquery.jparallax.min.js',
        array('jquery'),
        '1.1-20111122',
        true
    );
    wp_register_script(
        'firegoby',
        get_bloginfo("stylesheet_directory").'/js/firegoby.js',
        array('jquery-jparallax'),
        '20111122-1',
        true
    );
    wp_enqueue_script('firegoby');
    endif; // is_admin()
}

}
// eof