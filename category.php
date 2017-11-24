<?php

get_header();
$args = array(	'post_type'		=>'post',
				'posts_per_page'=>20
				);
$my_query = new WP_Query($args); 

if( $my_query->have_posts() ) : ?>
<article>
	<div class="container">
		<div class="bookmark">
			<h2><i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php single_cat_title(); ?></h2>
		</div>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php
			//necessary to show the tags 
			global $wp_query;
			$wp_query->in_the_loop = true;
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="border-news">
						<?php //the_ID(); ?>
						<?php //sthe_title_attribute(); ?><?php the_time('j F Y') ?> 
						<h4 class="text-left"><strong><?php the_title(); ?></strong></h4>
						
			
							<?php the_content('��������� �'); ?>
						<?php the_tags('����: ', ', ', ''); ?>
					</div>
				</div>
			</div>

		<?php endwhile; 
		the_posts_pagination( array(
				'end_size'     => 5,     // ���������� ������� �� ������
				'mid_size'     => 5,
				'prev_text'          => __( 'Previous page'),
				'next_text'          => __( 'Next page'),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
			) );?>
	<?php else : ?>

		<h2 class="center">��� ������</h2>
	<?php endif; ?>

	</div>
</article>

<?php get_footer(); ?>