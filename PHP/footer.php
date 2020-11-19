<?php
/**
 * The template for displaying the footer.
 */

				photolaboratory_close_wrapper();	// <!-- </.content> -->

				// Show main sidebar
				get_sidebar();

				if (photolaboratory_get_custom_option('body_style')!='fullscreen') photolaboratory_close_wrapper();	// <!-- </.content_wrap> -->
				?>
			
			</div>		<!-- </.page_content_wrap> -->
			
			<?php
			// Footer Testimonials stream
			if (photolaboratory_get_custom_option('show_testimonials_in_footer')=='yes') { 
				$count = max(1, photolaboratory_get_custom_option('testimonials_count'));
				$data = photolaboratory_sc_testimonials(array('count'=>$count));
				if ($data) {
					?>
					<footer class="testimonials_wrap sc_section scheme_<?php echo esc_attr(photolaboratory_get_custom_option('testimonials_scheme')); ?>">
						<div class="testimonials_wrap_inner sc_section_inner sc_section_overlay">
							<div class="content_wrap"><?php photolaboratory_show_layout($data); ?></div>
						</div>
					</footer>
					<?php
				}
			}

            // Footer contacts
            if (photolaboratory_get_custom_option('show_contacts_in_footer')=='yes') {

                $address_1 = photolaboratory_get_theme_option('contact_address_1');
                $address_2 = photolaboratory_get_theme_option('contact_address_2');
                $phone = photolaboratory_get_theme_option('contact_phone');
                $fax = photolaboratory_get_theme_option('contact_fax');
                $email = photolaboratory_get_theme_option('contact_email');
                $open_hours = photolaboratory_get_theme_option('contact_open_hours');
                $hours = photolaboratory_get_theme_option('contact_open_hours_footer');
                $map_address = photolaboratory_get_custom_option('googlemap_address');
                $map_latlng  = photolaboratory_get_custom_option('googlemap_latlng');
                $map_zoom    = photolaboratory_get_custom_option('googlemap_zoom');
                $map_style   = photolaboratory_get_custom_option('googlemap_style');
                $map_height  = photolaboratory_get_custom_option('googlemap_height');
                if (!empty($address_1) || !empty($address_2) || !empty($phone) || !empty($fax)) {
                    ?>
                    <footer class="contacts_wrap scheme_<?php echo esc_attr(photolaboratory_get_custom_option('contacts_scheme')); ?>">
                        <div class="contacts_wrap_inner" style="height: <?php photolaboratory_show_layout($map_height); ?>px;">
                            <div class="sc_googlemap_container">
                                <?php
								/*
                                if (!empty($map_address) || !empty($map_latlng)) {
                                    $args = array();
                                    if (!empty($map_style))		$args['style'] = esc_attr($map_style);
                                    if (!empty($map_zoom))		$args['zoom'] = esc_attr($map_zoom);
                                    if (!empty($map_height))	$args['height'] = esc_attr($map_height);
                                    photolaboratory_show_layout(photolaboratory_sc_googlemap($args));
								}
								*/
                                ?>
								<div class="map-responsive">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9850.826904409063!2d16.918199277094235!3d52.40260026491257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045b407f9b4adf%3A0xb370fcd48afc3d23!2sFotoma!5e0!3m2!1spl!2spl!4v1604935874266!5m2!1spl!2spl" 
									width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
                            </div>

                            <div class="content_wrap">
                                <div class="contact_content">
                                    <h4 class="sc_form_second_title"><?php esc_html_e('contact', 'photolaboratory'); ?></h4>
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_label"><?php esc_html_e('Address:', 'photolaboratory'); ?></span>
                                        <span class="sc_form_address_data"><?php photolaboratory_show_layout(($address_1) . (!empty($address_1) && !empty($address_2) ? ' ' : '') . $address_2); ?></span>
                                    </div>
                                    <div class="sc_form_address_field phone">
                                        <span class="sc_form_address_label"><?php esc_html_e('Phone:', 'photolaboratory'); ?></span>
                                        <span class="sc_form_address_data"><?php photolaboratory_show_layout(($phone) . (!empty($phone) && !empty($fax) ? ', ' : '') . $fax); ?></span>
                                    </div>
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_label"><?php esc_html_e('EMail:', 'photolaboratory'); ?></span>
                                        <span class="sc_form_address_data mail"><?php photolaboratory_show_layout($email); ?></span>
                                    </div>
                                    <h4 class="sc_form_second_title"><?php esc_html_e('hours', 'photolaboratory'); ?></h4>
                                    <div class="sc_form_address_field">
                                        <span class="sc_form_address_data hours"><?php photolaboratory_show_layout($hours); ?></span>
                                    </div>
                                </div>

                            </div>	<!-- /.content_wrap -->
                        </div>	<!-- /.contacts_wrap_inner -->
                    </footer>	<!-- /.contacts_wrap -->
                <?php
                }
            }
			
			// Footer sidebar
			$footer_show  = photolaboratory_get_custom_option('show_sidebar_footer');
			$sidebar_name = photolaboratory_get_custom_option('sidebar_footer');
			if (!photolaboratory_param_is_off($footer_show) && is_active_sidebar($sidebar_name)) { 
				photolaboratory_storage_set('current_sidebar', 'footer');
				?>
				<footer class="footer_wrap widget_area scheme_<?php echo esc_attr(photolaboratory_get_custom_option('sidebar_footer_scheme')); ?>">
					<div class="footer_wrap_inner widget_area_inner">
						<div class="content_wrap">
							<div class="columns_wrap"><?php
							ob_start();
							do_action( 'before_sidebar' );
							if ( !dynamic_sidebar($sidebar_name) ) {
								// Put here html if user no set widgets in sidebar
							}
							do_action( 'after_sidebar' );
							$out = ob_get_contents();
							ob_end_clean();
							photolaboratory_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $out));
							?></div>	<!-- /.columns_wrap -->
						</div>	<!-- /.content_wrap -->
					</div>	<!-- /.footer_wrap_inner -->
				</footer>	<!-- /.footer_wrap -->
				<?php
			}


			// Footer Twitter stream
			if (photolaboratory_get_custom_option('show_twitter_in_footer')=='yes') { 
				$count = max(1, photolaboratory_get_custom_option('twitter_count'));
				$data = photolaboratory_sc_twitter(array('count'=>$count));
				if ($data) {
					?>
					<footer class="twitter_wrap sc_section scheme_<?php echo esc_attr(photolaboratory_get_custom_option('twitter_scheme')); ?>">
						<div class="twitter_wrap_inner sc_section_inner sc_section_overlay">
							<div class="content_wrap"><?php photolaboratory_show_layout($data); ?></div>
						</div>
					</footer>
					<?php
				}
			}


			// Google map
			if ( photolaboratory_get_custom_option('show_googlemap')=='yes' ) { 
				$map_address = photolaboratory_get_custom_option('googlemap_address');
				$map_latlng  = photolaboratory_get_custom_option('googlemap_latlng');
				$map_zoom    = photolaboratory_get_custom_option('googlemap_zoom');
				$map_style   = photolaboratory_get_custom_option('googlemap_style');
				$map_height  = photolaboratory_get_custom_option('googlemap_height');
				if (!empty($map_address) || !empty($map_latlng)) {
					$args = array();
					if (!empty($map_style))		$args['style'] = esc_attr($map_style);
					if (!empty($map_zoom))		$args['zoom'] = esc_attr($map_zoom);
					if (!empty($map_height))	$args['height'] = esc_attr($map_height);
					photolaboratory_show_layout(photolaboratory_sc_googlemap($args));
				}
			}


			// Copyright area
			$copyright_style = photolaboratory_get_custom_option('show_copyright_in_footer');
			if (!photolaboratory_param_is_off($copyright_style)) {
				?> 
				<div class="copyright_wrap copyright_style_<?php echo esc_attr($copyright_style); ?>  scheme_<?php echo esc_attr(photolaboratory_get_custom_option('copyright_scheme')); ?>">
                    <?php
                    if ($copyright_style == 'menu') {
                        ?>
                        <div class="copyright_menu_wrap_inner">
                            <div class="content_wrap">
                                <?php
                                photolaboratory_show_logo(false, false, true);
                                photolaboratory_show_layout(photolaboratory_sc_socials(array('size'=>"tiny")));
                                if (($menu = photolaboratory_get_nav_menu('menu_footer'))!='') {
                                    photolaboratory_show_layout($menu);
                                }

                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<?php
							 if ($copyright_style == 'socials') {
                                 photolaboratory_show_layout(photolaboratory_sc_socials(array('size'=>"tiny")));
							}
							?>
							<div class="copyright_text"><?php echo force_balance_tags(photolaboratory_get_custom_option('footer_copyright')); ?></div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			
		</div>	<!-- /.page_wrap -->

	</div>		<!-- /.body_wrap -->
	
	<?php if ( !photolaboratory_param_is_off(photolaboratory_get_custom_option('show_sidebar_outer')) ) { ?>
	</div>	<!-- /.outer_wrap -->
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>