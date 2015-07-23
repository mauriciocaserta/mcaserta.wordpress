<?php



			echo '<section class="our-team" id="team">';


				echo '<div class="container">';


					echo '<div class="section-header">';


						$zerif_ourteam_title = get_theme_mod('zerif_ourteam_title',__('YOUR TEAM','zerif-lite'));
					
						if( !empty($zerif_ourteam_title) ):
							echo '<h2 class="dark-text">'.__($zerif_ourteam_title,'zerif-lite').'</h2>';
						endif;


						$zerif_ourteam_subtitle = get_theme_mod('zerif_ourteam_subtitle',__('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','zerif-lite'));


						if( !empty($zerif_ourteam_subtitle) ):


							echo '<h6>'.__($zerif_ourteam_subtitle,'zerif-lite').'</h6>';


						endif;


					echo '</div>';


					if(is_active_sidebar( 'sidebar-ourteam' )):
						echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';
							dynamic_sidebar( 'sidebar-ourteam' );
						echo '</div> ';
					else:
						echo '<div class="row" data-scrollreveal="enter left after 0s over 0.1s">';
							the_widget( 'zerif_team_widget','name=Robert Plant&position=Vocalista&description=#ROBERTPLANT&fb_link=#&tw_link=#&image_uri='.get_template_directory_uri().'/images/robert.jpg', array('before_widget' => '', 'after_widget' => '') );
							the_widget( 'zerif_team_widget','name=JIMMY PAGE&position=Guitarrista&description=#JIMMYPAGE&fb_link=#&tw_link=#&image_uri='.get_template_directory_uri().'/images/jimmy.jpg', array('before_widget' => '', 'after_widget' => '') );
							the_widget( 'zerif_team_widget','name=JOHN PAUL JONES&position=Baixista e Tecladista&description=#PAULJONES&fb_link=#&tw_link=#&image_uri='.get_template_directory_uri().'/images/paul.jpg', array('before_widget' => '', 'after_widget' => '') );
							the_widget( 'zerif_team_widget','name=JOHN BONHAM&position=Baterista&description=#JBONHAM&fb_link=#&tw_link=#&image_uri='.get_template_directory_uri().'/images/john.jpg', array('before_widget' => '', 'after_widget' => '') );
						echo '</div>';
					endif;



				echo '</div>';


			echo '</section>';

?>