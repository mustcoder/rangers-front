<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ranger_az
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/97aa96c74c.js"></script>
	<style>
		.social-menu-bar a{
			color:#fff;
		}
		.social-menu-bar a:hover{
			color:#fff;
		}
    #carousel-content {
        background-color: black;
        color: white;
    }

    #carousel-slick > div > div {
        margin: 0 10px;
        margin-top: 140px;
    }

   
    .text-box {
        background-color: black;
    }
    .header-text h2,p{
        color:#fff;
    }
    .button2:hover {
        background-color: rgb(100, 42, 42);
    }

    .inf{
        text-align: center;             
        color: white;
        
    }
    .content-box{
        background-color:#000
    }
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
    .header p{
        position: absolute;
        padding:10% 25%;

    }
    .header h1{
        padding: 4% 40%;
    }
    .header h1,p{
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
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="container-fluid" style="bg-color:#000;">
	<?php 
	get_template_part( 'partials/layouts/navbar');	# include(locate_template('partials/layouts/navbar.php', false, false ) );

