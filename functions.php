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
    add_filter(
        'the_content',
        array(&$this, "the_content")
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

public function the_content($content)
{
    if (is_single()) {
        $id = get_the_id();
        $args = array(
            'exclude' => array($id),
            'numberposts' => 10,
            'offset' => 0,
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC',
        );
        $recents = get_posts($args);
        $html = '<hr />';
        $html .= '<h2 class="recent_posts">'.__('Recent Posts').'</h2>';
        $html .= "<ul>";
        foreach ($recents as $p) {
            $html .= sprintf(
                '<li><a href="%s">%s</a></li>',
                esc_attr(get_permalink($p->ID)),
                esc_html(get_the_title($p->ID))
            );
        }
        $html .= "</ul>";
        $html .= '<hr />';

        $content .= $html;
    }
    return $content;
}

}
// eof
