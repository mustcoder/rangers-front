<?php
function rangers_register_taxonomy_article_categories() {
     $labels = [
         'name'              => _x( 'Article Categories', 'taxonomy general name' ),
         'singular_name'     => _x( 'Article Category', 'taxonomy singular name' ),
         'search_items'      => __( 'Search Article Categories' ),
         'all_items'         => __( 'All Article Categories' ),
         'parent_item'       => __( 'Parent Article Category' ),
         'parent_item_colon' => __( 'Parent Article Category:' ),
         'edit_item'         => __( 'Edit Article Category' ),
         'update_item'       => __( 'Update Article Category' ),
         'add_new_item'      => __( 'Add New Article Category' ),
         'new_item_name'     => __( 'New Article Category Name' ),
         'menu_name'         => __( 'Article Category' ),
     ];
     $args   = array(
         'hierarchical'      => true, // make it hierarchical (like categories)
         //'label'           => 'Categories',
         'labels'            => $labels,
         'show_ui'           => true,
         'show_admin_column' => true,
         'query_var'         => true,
         'show_tagcloud'     => false,
         'rewrite'           => [ 'slug' => 'article-category' ],
     );
     register_taxonomy( 'article-category', [ 'articles' ], $args );
}

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