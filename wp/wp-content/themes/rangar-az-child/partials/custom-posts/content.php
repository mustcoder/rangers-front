<style>
       section {
           font-family: 'Times New Roman', Times, serif;
           margin-left: 50px;
        }

       .content h3 {
           color: red;
           text-transform: uppercase;
        }
    </style>

    <?php  
        $post_type = 'all-' . get_post_type( get_the_ID());
        // $page = get_posts(['name' =>  $post_type]);
        $page_query = new WP_Query(
            ['pagename' => $post_type]
        );

        while ($page_query->have_posts()): $page_query->the_post();
        ?>
        <div class="row">
           <?php get_template_part('partials/layouts/page-title'); ?>
        </div>
        <?php
           wp_reset_postdata();
        endwhile;
    ?>


    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <section>
                <h4 class="text-danger text-uppercase font-weight-bold pt-3">
                    <?php the_title() ?>
                </h4>
                <?php
                    $image = get_field('articles_main_image');
                    if (isset($image)):
                        $image_title = $image['title'];
                        $image_alt = $image['alt'];
                        $image_src = $image['url'];
    
                ?>
                        <img 
                            src="<?= $image_src ?>" class="img-fluid"
                            title="<?= $image_title ?>"
                            alt="<?= $image_alt ?>"
                        >
                <?php
                    endif;
                ?>
                <?php if(get_field('article_content')): ?>
                    <?php the_field('article_content') ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="font-weight-bold">
                            <?php the_field('article_author') ?>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="font-weight-bold font-italic">
                            <?php the_field('article_published_date') ?>
                        </p>
                    </div>
                </div>
                <?php if (get_field('news_source')): ?>
                <div class="row">
                    <p class="col-sm-12">
                        <a href="<?php the_field('news_source') ?>" target="_blank">
                            <?php the_field('news_source') ?>
                        </a>
                    </p>
                </div>
                <?php endif; ?>
            </section>  
        </div>
        <div class="col-xs-12 col-sm-4">
		    <?php get_template_part('partials/custom-posts/sidebar'); ?>
        </div>
    </div>