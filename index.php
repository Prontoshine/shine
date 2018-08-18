<?php
get_header();

if ( have_posts() ) : 
/* Start the Loop */

while ( have_posts() ) : the_post();
	get_template_part( 'templates/content', get_post_format() );
endwhile;
endif; 


the_posts_pagination();

get_footer();

wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shine-theme' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shine-theme' ) . ' </span>%',
	'separator'   => '<span class="screen-reader-text">, </span>',
) );