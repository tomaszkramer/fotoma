<?php
/**
 * Single post
 */
get_header(); 

$single_style = photolaboratory_storage_get('single_style');
if (empty($single_style)) $single_style = photolaboratory_get_custom_option('single_style');

while ( have_posts() ) { the_post();
	photolaboratory_show_post_layout(
		array(
			'layout' => $single_style,
			'sidebar' => !photolaboratory_param_is_off(photolaboratory_get_custom_option('show_sidebar_main')),
			'content' => photolaboratory_get_template_property($single_style, 'need_content'),
			'terms_list' => photolaboratory_get_template_property($single_style, 'need_terms')
		)
	);
}

get_footer();
?>