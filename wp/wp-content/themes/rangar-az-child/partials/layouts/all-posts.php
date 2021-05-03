<?php

 // The Query
$posts_query = new WP_Query($args);

?>

<style>
    .social-menu-bar {
        position: relative;
        width: 100%;
        height: 40px;
        line-height: 32px;
        background-color: black;
    }
    .social_menu{
        position: relative;
        right: 180px;
    }
    .social_menu a{
        color: blanchedalmond;
        float: right;
        margin:6px 10px;
        background-color: none;
        text-decoration: none;   
    }
    .social_menu a:hover{
        color: #fff;
    }
    .modal-btn{
        position: relative;
        right: -120px;
    }
    /* BREADCRUMB */
    /* .social-menu-bar .breadcrumb{
        background-color: black;
    }
    .social-menu-bar .breadcrumb .breadcrumb-item{
        color: #808080;
        font-weight: bold;
    }
    .social-menu-bar .breadcrumb .breadcrumb-item a{
        color:#fff;
        text-decoration: none;
        font-weight: bold;
    } */
    .header{
        background-color: #070707;
        width: 90rem;
        height: 14rem;

    }
    .header p {
        position: absolute;
        padding:10% 25%;

    }
    .header h1 {
        padding: 4% 40%;
    }
    .header h1, .header p {
        color: #f5e7e7;
        font-weight: bold;
    }
    .header-text p{
        color: #070707;
        text-align: center;
        margin-top: 20px;
        font-weight: initial;
    }
    .box img{
        position: relative;
        width: 100%;
        height: 14rem;
        margin-top: 10%;
        z-index: -1;
    }
    .box button {
        position: absolute;
        border-radius: 10px;
        border:none;
        background-color: rgb(160, 1, 1);
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 14px;
        padding: 10px 50px;
        margin: 240px -280px;
        text-transform: uppercase;   
    }
    .box p{
        color: #070707;
        font-weight: initial;
        margin: 40px 20px 0px;
    }
</style>
<div class="row">
    <?php get_template_part('partials/layouts/page-title') ?>
</div>
<div class="row">
    <div class="col-12 header-text">
        <?php the_content() ?>
    </div>
    <?php if (have_posts()):?>
        <?php while ($posts_query->have_posts() ): $posts_query->the_post() ?>
            <div class= "col-12 col-md-4 col-lg-4">
                <div class="box text-center">
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

                    <a href="<?= get_permalink() ?>" target="_blank" class="btn btn-danger">
                        <?= get_the_title() ?>
                    </a>
                    <p><?php the_excerpt() ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif;?>
</div>