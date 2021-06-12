<?php 
get_header() 
?>

<div class="row">
    <?php get_template_part('partials/layouts/page-title') ?>
</div>

    <?php if (have_posts()):?>
        <div class="row">
            <h1 class="col-sm-12 text-center">
                <?php the_title() ?>
            </h1>
            <div><?php the_content() ?></div>
        </div>
    <?php endif; ?>

<?php get_footer() ?>