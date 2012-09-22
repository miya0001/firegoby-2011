<?php

load_theme_textdomain('twentyeleven', dirname(__FILE__).'/languages');

new firegoby();

class firegoby {

function __construct()
{
    add_action(
        'after_setup_theme',
        array(&$this, "after_setup_theme"),
        9999
    );
    add_action(
        'wp_enqueue_scripts',
        array(&$this, "wp_enqueue_scripts")
    );
}

public function after_setup_theme()
{
    @remove_theme_support('custom-header');
}

public function wp_enqueue_scripts()
{
    if (!is_admin()) :
    wp_deregister_script( 'jquery' );
    wp_register_script(
        'jquery',
        'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
        false,
        null,
        true
    );
    wp_register_script(
        'jquery-jparallax',
        get_stylesheet_directory_uri().'/js/jquery.jparallax.min.js',
        array('jquery'),
        '1.1-20111122',
        true
    );
    wp_register_script(
        'alice',
        get_stylesheet_directory_uri().'/js/alice-min.js',
        array(),
        '20120605-01',
        true
    );
    wp_register_script(
        'firegoby',
        get_stylesheet_directory_uri().'/js/firegoby.js',
        array('jquery-jparallax', 'alice'),
        '20120608-01',
        true
    );
    wp_enqueue_script('firegoby');
    endif; // is_admin()
}

}
// eof
