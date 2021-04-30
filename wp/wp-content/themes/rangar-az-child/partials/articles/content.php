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
            </section>  
        </div>
        <div class="col-xs-12 col-sm-4">
		    <?php get_template_part('partials/articles/sidebar'); ?>
        </div>
    </div>