<?php
get_header();

if ( have_posts() ) : 
/* Start the Loop */

$args = array(
	'posts_per_page' => 1,
	'post__in'  => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
);
$query = new WP_Query( $args );


while( $query->have_posts() ) : $query->the_post();
	get_template_part( 'templates/content', get_post_format() );
endwhile;

while ( have_posts() ) : the_post();
	if ( !is_sticky() ) {
		get_template_part( 'templates/content', get_post_format() );
	}
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