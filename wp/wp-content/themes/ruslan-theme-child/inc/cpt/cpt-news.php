<?php
# Article of cpt_
define('NEWS_POST_TYPE', 'news');
define('NEWS_POST_SLUG', 'news');

function news_register_post_type() {
    $args = array (
        'labels' => [
            'name'          => 'News',
            'singular_name' => 'News',
            'add_new_item'  => 'Add New News',
            'new_item'      => 'New News',
            'edit_item'     => 'Edit News',
        ],
        //'register_meta_box_cb' => 'testimonial_meta_box_cb',
        'menu_icon'          => 'http://rangers.sev/wp-content/themes/ruslan-theme-child/assets/img/news.png',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false, //['slug' => TESTIMONIAL_POST_SLUG],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => ['title', 'slug'], //, 'editor'
    );
    register_post_type(NEWS_POST_TYPE , $args);
}

add_action('init', 'news_register_post_type');


?>
