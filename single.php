<?php

get_header(); 
?>
<article>
	<div class="container">
<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

		$categories = get_the_category();
		$category_id = count($categories) ? $categories[0]->cat_ID: 1; ?>

		<div class="bookmark">
			<h2><i class="fa fa-newspaper-o" aria-hidden="true"></i><?php 
			echo get_cat_name($category_id); echo single_cat_title();?></h2>
		</div>

<?php
			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */

			get_template_part( 'content/post_content', get_post_format() );

			// Previous/next post navigation.
			/*the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next') . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:') . '</span> ' .
					'<span class="post-title">%title</span>',
			) );*/

		// End the loop.
		endwhile;
		?>
		</div>
</article>
<?php get_footer(); ?>
