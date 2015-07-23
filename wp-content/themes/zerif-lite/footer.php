<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the #content div and all content after

 *

 * @package zerif

 */

?>



<footer id="footer">

<div class="container">



	<?php
		$footer_sections = 0;
		$zerif_address = get_theme_mod('zerif_address',__('Company address','zerif-lite'));
		$zerif_address_icon = get_theme_mod('zerif_address_icon',get_template_directory_uri().'/images/map25-redish.png');
		
		$zerif_email = get_theme_mod('zerif_email','<a href="mailto:contact@site.com">contact@site.com</a>');
		$zerif_email_icon = get_theme_mod('zerif_email_icon',get_template_directory_uri().'/images/envelope4-green.png');
		
		$zerif_phone = get_theme_mod('zerif_phone','<a href="tel:0 332 548 954">0 332 548 954</a>');
		$zerif_phone_icon = get_theme_mod('zerif_phone_icon',get_template_directory_uri().'/images/telephone65-blue.png');

		$zerif_socials_facebook = get_theme_mod('zerif_socials_facebook','#');
		$zerif_socials_twitter = get_theme_mod('zerif_socials_twitter','#');


		if(!empty($zerif_address) || !empty($zerif_address_icon)):
			$footer_sections++;
		endif;
		
		if(!empty($zerif_email) || !empty($zerif_email_icon)):
			$footer_sections++;
		endif;
		
		if(!empty($zerif_phone) || !empty($zerif_phone_icon)):
			$footer_sections++;
		endif;
		if(!empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || 
		!empty($zerif_copyright)):
			$footer_sections++;
		endif;
		
		if( $footer_sections == 1 ):
			$footer_class = 'col-md-12';
		elseif( $footer_sections == 2 ):
			$footer_class = 'col-md-6';
		elseif( $footer_sections == 3 ):
			$footer_class = 'col-md-4';
		elseif( $footer_sections == 4 ):
			$footer_class = 'col-md-3';
		else:
			$footer_class = 'col-md-3';
		endif;
		
		/* COMPANY ADDRESS */
		if( !empty($zerif_address) ):
			echo '<div class="'.$footer_class.' company-details">';
				echo '<div class="icon-top red-text">';
					if( !empty($zerif_address_icon) ) echo '<img src="'.esc_url(__($zerif_address_icon,'zerif-lite')).'">';
				echo '</div>';
				echo $zerif_address;
			echo '</div>';
		endif;
		
		/* COMPANY EMAIL */
		
		
		if( !empty($zerif_email) ):
			echo '<div class="'.$footer_class.' company-details">';
				echo '<div class="icon-top green-text">';
					
					if( !empty($zerif_email_icon) ) echo '<img src="'.esc_url(__($zerif_email_icon,'zerif-lite')).'">';
				echo '</div>';
				echo $zerif_email;
			echo '</div>';
		endif;
		
		/* COMPANY PHONE NUMBER */
		
		
		if( !empty($zerif_phone) ):
			echo '<div class="'.$footer_class.' company-details">';
				echo '<div class="icon-top blue-text">';
					if( !empty($zerif_phone_icon) ) echo '<img src="'.esc_url(__($zerif_phone_icon,'zerif-lite')).'">';
				echo '</div>';
				echo $zerif_phone;
			echo '</div>';
		endif;
		
		if( !empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || 
		!empty($zerif_copyright)):
		
					echo '<div class="'.$footer_class.' copyright">';
					if(!empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble)):
						echo '<ul class="social">';
						
						/* facebook */
						if( !empty($zerif_socials_facebook) ):
							echo '<li><a target="_blank" href="'.esc_url(__($zerif_socials_facebook,'zerif-lite')).'"><i class="fa fa-facebook"></i></a></li>';
						endif;
						/* twitter */
						if( !empty($zerif_socials_twitter) ):
							echo '<li><a target="_blank" href="'.esc_url(__($zerif_socials_twitter,'zerif-lite')).'"><i class="fa fa-twitter"></i></a></li>';
						endif;
						
					endif;	
			
			
					if( !empty($zerif_copyright) ):
						echo esc_attr($zerif_copyright);
					endif;
					
					echo '<div class="zerif-copyright-box"><a class="zerif-copyright" href="#" target="_blank" rel="nofollow">#LED </a>'.__('powered by','zerif-lite').'<a class="zerif-copyright" href="http://www.facebook.com/mauricio.caserta" target="_blank" rel="nofollow"> Maurício Caserta</a></div>';
					
					echo '</div>';
			
		endif;
	?>

</div> <!-- / END CONTAINER -->

</footer> <!-- / END FOOOTER  -->



<?php wp_footer(); ?>



</body>

</html>
