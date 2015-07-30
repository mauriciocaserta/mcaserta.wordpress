<?php
/**

 * The Header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package zerif

 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>

        <meta charset="<?php bloginfo('charset'); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php wp_title('|', true, 'right'); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11">

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <link rel="stylesheet" href="wp-content/themes/zerif-lite/css/style.css">
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/ie.css" type="text/css">
        <![endif]-->

        <?php wp_head(); ?>

    </head>



    <?php if (isset($_POST['scrollPosition'])): ?>

        <body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

        <?php else: ?>

        <body <?php body_class(); ?> >

        <?php endif; ?>




        <!-- =========================
        
           PRE LOADER
        
        ============================== -->
        <?php
        global $wp_customize;

        if (is_front_page() && !isset($wp_customize) && get_option('show_on_front') != 'page'):

            $zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');

            if (isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):

                echo '<div class="preloader">';
                echo '<div class="status">&nbsp;</div>';
                echo '</div>';

            endif;

        endif;
        ?>


        <header id="home" class="header">

            <div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">
                <a>#LEDZEPPELIN</a>

                <a class="login" id="login" href="#">#LOGIN</a>
            </div>

            <div class="form-login" id="form-login">
                <form>
                    <div class="form-group input-group"> 
                        <input placeholder="Usuario" name="nome" id="nome" type="text"/>
                        <input placeholder="Senha" name="senha" id="senha" type="password"/>

                        <button type="button" id="entrar" class="btn btn-success">Entrar</button>
                        <button type="reset" class="btn btn-danger">Limpar</button>
                    </div>
                </form>
            </div>

            <script>
                var click = 0;
                $("#login").click(function () {
                    if (click < 1) {
                        $("#form-login").fadeIn('slow');
                        click++;
                    } else {
                        $("#form-login").fadeOut('slow');
                        click = 0;
                    }
                });

            </script>
            <!-- / END TOP BAR -->