<?php get_header(); ?>


<?php
if (get_option('show_on_front') == 'page') {
    ?>
    <div class="clear"></div>

    </header> <!-- / END HOME SECTION  -->

    <?php script_jquery(); ?>



    <div id="content" class="site-content">

        <div class="container">



            <div class="content-left-wrap col-md-9">



                <div id="primary" class="content-area">

                    <main id="main" class="site-main" role="main">



                        <?php if (have_posts()) : ?>



                            <?php /* Start the Loop */ ?>

                            <?php while (have_posts()) : the_post(); ?>



                                <?php
                                /* Include the Post-Format-specific template for the content.

                                 * If you want to override this in a child theme, then include a file

                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.

                                 */

                                get_template_part('content', get_post_format());
                                ?>



                            <?php endwhile; ?>



                            <?php zerif_paging_nav(); ?>



                        <?php else : ?>



                            <?php get_template_part('content', 'none'); ?>



                        <?php endif; ?>



                    </main><!-- #main -->


                </div><!-- #primary -->



            </div><!-- .content-left-wrap -->



            <div class="sidebar-wrap col-md-3 content-left-wrap">

                <?php get_sidebar(); ?>

            </div><!-- .sidebar-wrap -->


        </div><!-- .container -->
        <?php
    }else {

        if (isset($_POST['submitted'])) :


            /* recaptcha */

            $zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');

            $zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');

            $zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

            if (isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey)) :

                $captcha;

                if (isset($_POST['g-recaptcha-response'])) {

                    $captcha = $_POST['g-recaptcha-response'];
                }

                if (!$captcha) {

                    $hasError = true;
                }

                $response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=" . $zerif_contactus_secretkey . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);

                if ($response['body'] . success == false) {

                    $hasError = true;
                }

            endif;



            /* name */


            if (trim($_POST['myname']) === ''):


                $nameError = __('* Please enter your name.', 'zerif-lite');


                $hasError = true;


            else:


                $name = trim($_POST['myname']);


            endif;


            /* email */


            if (trim($_POST['myemail']) === ''):


                $emailError = __('* Please enter your email address.', 'zerif-lite');


                $hasError = true;


            elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :


                $emailError = __('* You entered an invalid email address.', 'zerif-lite');


                $hasError = true;


            else:


                $email = trim($_POST['myemail']);


            endif;


            /* subject */


            if (trim($_POST['mysubject']) === ''):


                $subjectError = __('* Please enter a subject.', 'zerif-lite');


                $hasError = true;


            else:


                $subject = trim($_POST['mysubject']);


            endif;


            /* message */


            if (trim($_POST['mymessage']) === ''):


                $messageError = __('* Please enter a message.', 'zerif-lite');


                $hasError = true;


            else:


                $message = stripslashes(trim($_POST['mymessage']));


            endif;





            /* send the email */


            if (!isset($hasError)):


                $zerif_contactus_email = get_theme_mod('zerif_contactus_email');

                if (empty($zerif_contactus_email)):

                    $emailTo = get_theme_mod('zerif_email');

                else:

                    $emailTo = $zerif_contactus_email;

                endif;

                $emailTo = "mauricio@squadit.com.br";


                if (isset($emailTo) && $emailTo != ""):

                    if (empty($subject)):
                        $subject = 'From ' . $name;
                    endif;

                    $body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";


                    $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;


                    wp_mail($emailTo, $subject, $body, $headers);


                    $emailSent = true;


                else:


                    $emailSent = false;


                endif;


            endif;


        endif;



        $zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');

        if (isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1):

            include get_template_directory() . "/sections/big_title.php";
        endif;
        ?>


    </header> <!-- / END HOME SECTION  -->

    <div id="content" class="site-content">



        <?php
        /* OUR FOCUS SECTION */

        $zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

        if (isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1):
            include get_template_directory() . "/sections/our_focus.php";
        endif;


        /* RIBBON WITH BOTTOM BUTTON */


        include get_template_directory() . "/sections/ribbon_with_bottom_button.php";







        /* ABOUT US */

        $zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

        if (isset($zerif_aboutus_show) && $zerif_aboutus_show != 1):

            include get_template_directory() . "/sections/about_us.php";
        endif;


        /* OUR TEAM */

        $zerif_ourteam_show = get_theme_mod('zerif_ourteam_show');

        if (isset($zerif_ourteam_show) && $zerif_ourteam_show != 1):

            include get_template_directory() . "/sections/our_team.php";
        endif;


        /* TESTIMONIALS */

        $zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

        if (isset($zerif_testimonials_show) && $zerif_testimonials_show != 1):

            include get_template_directory() . "/sections/testimonials.php";
        endif;




        /* RIBBON WITH RIGHT SIDE BUTTON */


        include get_template_directory() . "/sections/ribbon_with_right_button.php";



        /* LATEST NEWS */
        $zerif_latestnews_show = get_theme_mod('zerif_latestnews_show');

        if (isset($zerif_latestnews_show) && $zerif_latestnews_show != 1):

            include get_template_directory() . "/sections/latest_news.php";

        endif;



        /* CONTACT US */
        $zerif_contactus_show = get_theme_mod('zerif_contactus_show');

        if (isset($zerif_contactus_show) && $zerif_contactus_show != 1):
            ?>
            <section class="contact-us" id="contact">
                <div class="container">
                    <!-- SECTION HEADER -->
                    <div class="section-header">

                        <?php
                        $zerif_contactus_title = get_theme_mod('zerif_contactus_title', 'Get in touch');
                        if (!empty($zerif_contactus_title)):
                            echo '<h2 class="white-text">' . $zerif_contactus_title . '</h2>';
                        endif;

                        $zerif_contactus_subtitle = get_theme_mod('zerif_contactus_subtitle');
                        if (isset($zerif_contactus_subtitle) && $zerif_contactus_subtitle != ""):
                            echo '<h6 class="white-text">' . $zerif_contactus_subtitle . '</h6>';
                        endif;
                        ?>
                    </div>
                    <!-- / END SECTION HEADER -->

                    <!-- CONTACT FORM-->
                    <div class="row">

                        <?php
                        if (isset($emailSent) && $emailSent == true) :

                            echo '<div class="notification success"><p>' . __('Thanks, your email was sent successfully!', 'zerif-lite') . '</p></div>';

                        elseif (isset($_POST['submitted'])):

                            echo '<div class="notification error"><p>' . __('Sorry, an error occured.', 'zerif-lite') . '</p></div>';

                        endif;



                        if (isset($nameError) && $nameError != '') :

                            echo '<div class="notification error"><p>' . esc_html($nameError) . '</p></div>';

                        endif;

                        if (isset($emailError) && $emailError != '') :

                            echo '<div class="notification error"><p>' . esc_html($emailError) . '</p></div>';

                        endif;

                        if (isset($subjectError) && $subjectError != '') :

                            echo '<div class="notification error"><p>' . esc_html($subjectError) . '</p></div>';

                        endif;

                        if (isset($messageError) && $messageError != '') :

                            echo '<div class="notification error"><p>' . esc_html($messageError) . '</p></div>';

                        endif;
                        ?>

                        <form role="form" name="form-contato" id="form-contato" method="POST" onSubmit="this.scrollPosition.value = (document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

                            <input type="hidden" name="scrollPosition">

                            <input type="hidden" name="submitted" id="submitted" value="true" />

                            <div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

                                <input required="required" id="myname" type="text" name="myname" placeholder="Your Name" class="form-control input-box" value="<?php if (isset($_POST['myname'])) echo esc_attr($_POST['myname']); ?>">

                            </div>

                            <div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

                                <input required="required" id="myemail" type="email" name="myemail" placeholder="Your Email" class="form-control input-box" value="<?php if (isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">

                            </div>

                            <div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

                                <input required="required" id="mysubject" type="text" name="mysubject" placeholder="Subject" class="form-control input-box" value="<?php if (isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']); ?>">

                            </div>

                            <div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">

                                <textarea name="mymessage" id="mymessage" class="form-control textarea-box" placeholder="Your Message"><?php
                                    if (isset($_POST['mymessage'])) {
                                        echo esc_html($_POST['mymessage']);
                                    }
                                    ?></textarea>

                            </div>

                            <?php
                            $zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label', 'Send Message');
                            if (!empty($zerif_contactus_button_label)):
                                echo '<button name="enviar_email" id="enviar_email" class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">' . $zerif_contactus_button_label . '</button>';

                            endif;
                            ?>

                            <?php
                            $zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
                            $zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
                            $zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

                            if (isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey)) :

                                echo '<div class="g-recaptcha" data-sitekey="' . $zerif_contactus_sitekey . '"></div>';

                            endif;
                            ?>
                        </form>

                    </div>

                    <!-- / END CONTACT FORM-->

                </div> <!-- / END CONTAINER -->


            </section> <!-- / END CONTACT US SECTION-->  

            <script>
                $("#sair").click(function (event) {
                    $('body').width('100%');
                    $('#menu-lateral').fadeOut('slow');
                    $('#login').fadeIn('slow');
                });

                $("#entrar").click(function (event) {

                    event.preventDefault();
                    $.ajax({
                        url: "/services/validaUsuario.php",
                        dataType: "json",
                        type: "POST",
                        data: {'nome': $('#nome').val(),
                            'senha': $('#senha').val()
                        },
                        success: function (data) {
                            var rJson = JSON.parse(JSON.stringify(data));
                            if (rJson.retorno === true) {
                                $('#nomeusuario').text($('#nome').val());
                                $('#nome').val("");
                                $('#senha').val("");
                                $('#form-login').fadeOut('slow');
                                $('#login').fadeOut('slow');
                                $("#menu-lateral").fadeIn('slow');
                                $('body').width('90%');
                            } else {
                                alert('Usuário ou senha Invalidos!');
                            }
                        },
                        error: function (data) {
                            alert('TRETA');
                        }
                    });
                });

                $("#enviar_email").click(function () {

                    $.ajax({
                        url: "/services/gravaContato.php",
                        dataType: "json",
                        type: "POST",
                        data: {'nome': $('#myname').val(),
                            'email': $('#myemail').val(),
                            'assunto': $('#mysubject').val(),
                            'mensagem': $('#mymessage').val()
                        },
                        success: function (data) {
                            // converter retorno para um objeto Json
                            var rJson = JSON.parse(data);
                            // verificar se o serviço retorna true
                            if (rJson.retorno === true) {
                                //alert('Inserido com Sucesso!');    
                            } else {
                                // alert('Não Inserido!');
                            }
                        },
                        error: function (data) {
                            alert('Deu Treta');
                        }

                    });
                });

                $("#cadastrar").click(function (event) {

                    event.preventDefault();
                    $.ajax({
                        url: "/services/cadastraUsuario.php",
                        dataType: "json",
                        type: "POST",
                        data: {'nome': $('#nomecadastro').val(),
                            'senha': $('#senhacadastro').val()
                        },
                        success: function (data) {
                            // converter retorno para um objeto Json
                            var rJson = JSON.parse(data);
                            // verificar se o serviço retorna true
                            if (rJson.retorno === true) {
                                alert('Inserido com Sucesso!');
                                $('#nomecadastro').val("");
                                $('#senhacadastro').val("");
                            } else {
                                alert('Não Inserido!');
                            }
                        },
                        error: function (data) {
                            alert('Não Inserido!');
                        }
                    });
                });

                $(document).ready(function () {

                    var table = $('#tabela-usuarios').DataTable({
                        "ajax": {
                            url: "/services/listaUsuarios.php",
                            dataType: "json",
                            dataSrc: "usuarios"
                        },
                        "aoColumns": [
                            {"mData": "id"},
                            {"mData": "nome"}
                        ]

                    });

                    $('#tabela-usuarios tbody').on('dblclick','tr', function () {
                   

                        if ($(this).hasClass('selected')) {
                            $(this).removeClass('selected');
                        }
                        else {
                            table.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                        
                             var data = table.row(this).data();

                        $('#btn_excluir').click(function () {
                            $.ajax({
                                url: "/services/deletaUsuario.php",
                                dataType: "json",
                                type: "POST",
                                data: {
                                    'id': data.id
                                },
                                success: function (data) {
                                    var rJson = JSON.parse(data);

                                    if (rJson.retorno === true) {
                                        alert('Removido com Sucesso!');
                                        table.row('.selected').remove().draw(false);
                                    } else {
                                        alert('Não Removido!');
                                    }
                                },
                                error: function (data) {
                                    alert('TRETA!');
                                }
                            });
                        });
                    });

                    $("#btn_usuarios").click(function () {
                        table.ajax.reload(null, false);
                    });
                });


            </script>
            <?php
        endif;
    }
    get_footer();
    