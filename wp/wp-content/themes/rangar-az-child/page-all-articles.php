<?php 
get_header() 
?>
<?php 

$post_arguments = [
    'post_type' => 'articles',
    'posts_per_page' => 3
];

?>

<?php get_template_part('partials/layouts/all-posts', null, $post_arguments) ?>

<?php get_footer() ?>