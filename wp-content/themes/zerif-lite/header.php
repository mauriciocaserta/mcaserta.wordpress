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
        
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>

        <script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.7/api/fnReloadAjax.js"></script>
        
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
                        <button type="reset" id="limpar" class="btn btn-danger">Limpar</button>
                    </div>
                </form>
            </div>

            <!-- MODAL CADASTRO USUARIOS -->
            <div class="modal-cadastro modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Cadastrar Usuários</h4>
                        </div>
                        <form>
                            <div class="modal-body">
                                <input placeholder="Usuario" name="nome" id="nomecadastro" type="text"/><br>
                                <input placeholder="Senha" name="senha" id="senhacadastro" type="password"/><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button id="cadastrar" type="button" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL USUARIOS -->
            <div class="modal-usuarios modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Usuarios Cadastrados</h4>
                        </div>
                        <form>
                            <div class="modal-body">
                               <table id="tabela-usuarios" class="display" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                            
                                            <th>id</th>
                                           
                                            <th>nome</th>
                                            
                                        </tr>
                                    </thead>
                                </table>
                                 <button id="btn_excluir" type="button" class="btn-excluir btn btn-danger">Excluir</button> 
                                <br>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MENU LATERAL (PAINEL DE CONTROLE) -->
            <div id="menu-lateral" class="menu-lateral">
                <br><br>
                <h5>Painel de Controle<h5>
                        <hr>
                        <h6>Seja bem Vindo! </h6>
                        <h1 id="nomeusuario"></h1><br>
                        <br>
                        <button class="btn btn-primary" data-toggle="modal" data-target=".modal-cadastro">Cadastrar</button>
                        <button id="btn_usuarios" class="btn btn-warning" data-toggle="modal" data-target=".modal-usuarios">Usuarios</button>
                        <br>
                        <button class="btn btn-sair btn-danger" id="sair">X</button>
                        </div>


                        <!-- FIM MENU LATERAL -->
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