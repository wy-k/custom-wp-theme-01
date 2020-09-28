<?php

//link CSS and JS files

function gt_setup() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab');
    wp_enqueue_style('fontawesome', '//kit.fontawesome.com/42a7529346.js');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'gt_setup');

// Adding Theme Support 

function site_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', 
        array('comment-list', 'comment-form', 'search-form')
    );
}

add_action('after_setup_theme', 'site_init');

// Projects Post Type

function site_custom_post_type() {
    register_post_type('project',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-analytics',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
     );
}

add_action('init', 'site_custom_post_type');

// Sidebar

function site_widgets() {
    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id' => 'main-sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
     );
}

add_action('widgets_init', 'site_widgets');

// Search Filters

function search_filter($query) {
    if ($query->is_search()){
        $query->set('post_type', array('post', 'project'));
    }
}

add_filter('pre_get_posts', 'search_filter');

?>