<?php
function rangers_register_taxonomy_news_categories() {
    $labels = [
        'name'              => _x( 'News Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'News Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search News Categories' ),
        'all_items'         => __( 'All News Categories' ),
        'parent_item'       => __( 'Parent News Category' ),
        'parent_item_colon' => __( 'Parent Newss Category:' ),
        'edit_item'         => __( 'Edit News Category' ),
        'update_item'       => __( 'Update News Category' ),
        'add_new_item'      => __( 'Add New News Category' ),
        'new_item_name'     => __( 'New News Category Name' ),
        'menu_name'         => __( 'News Category' ),
    ];
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        // 'label'             => 'News Categories',
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_tagcloud'     => true,
        'rewrite'           => [ 'slug' => 'news-category' ],
    );
    register_taxonomy( 'news-category', [ 'news' ], $args );
}
add_action( 'init', 'rangers_register_taxonomy_news_categories' );

function rangers_register_taxonomy_news_tags() {
    $labels = [
        'name'              => _x( 'News Tags', 'taxonomy general name' ),
        'singular_name'     => _x( 'News Tags', 'taxonomy singular name' ),
        'search_items'      => __( 'Search News Tags' ),
        'all_items'         => __( 'All News Categories' ),
        'parent_item'       => __( 'Parent News Tags' ),
        'parent_item_colon' => __( 'Parent News Tags:' ),
        'edit_item'         => __( 'Edit News Tags' ),
        'update_item'       => __( 'Update News Tags' ),
        'add_new_item'      => __( 'Add New News Tags' ),
        'new_item_name'     => __( 'New News Tag Name' ),
        'menu_name'         => __( 'News Tag' ),
    ];
    $args   = array(
        'hierarchical'      => false, // make it hierarchical (like categories)
        // 'label'             => 'News Categories',
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_tagcloud'     => true,
        'rewrite'           => [ 'slug' => 'news-tag' ],
    );
    register_taxonomy( 'news-tag', [ 'news' ], $args );
}
add_action( 'init', 'rangers_register_taxonomy_news_tags' );

// add tag and category support to pages
// function tags_categories_support_all() {
//     register_taxonomy_for_object_type('post_tag', 'page');
//     register_taxonomy_for_object_type('category', 'page');  
//   }
   
// ensure all tags and categories are included in queries
// function tags_categories_support_query($wp_query) {
//     if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
//     if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
// }
   
// tag and category hooks
// add_action('init', 'tags_categories_support_all');
// add_action('pre_get_posts', 'tags_categories_support_query');