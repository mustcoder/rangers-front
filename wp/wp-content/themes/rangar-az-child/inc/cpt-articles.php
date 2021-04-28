<?php
# Employees of cpt_
define('ARTICLES_POST_TYPE', 'articles');
define('ARTICLES_POST_SLUG', 'articles');

function articles_register_post_type() {
  $args = array (
    'labels' => [
      'name'          => 'Articles',
      'singular_name' => 'Article',
      'add_new_item'  => 'Add New Article',
      'new_item'      => 'New Article',
      'edit_item'     => 'Edit Article',
    ],
    //'register_meta_box_cb' => 'testimonial_meta_box_cb',
    'menu_icon'          => 'http://rangers.sev/wp-content/themes/rangar-az-child/assets/img/articles.png',
    'public'             => false,
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
  register_post_type(ARTICLES_POST_TYPE , $args);
}

add_action('init', 'articles_register_post_type');


?>
