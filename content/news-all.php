<?php

get_header(); ?>

<?php
$args = array(	'post_type'		=>'post', 
				'tag'			=>'news', 
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
			<?php post_class() ?>
			<?php the_ID(); ?>
			<?php the_title_attribute(); ?><?php the_time('F jS, Y') ?> 
			<h4 class="text-left"><strong><?php the_title(); ?></strong></h4>
			

				<?php the_content('Подробнее »'); ?>
<?php the_tags('Теги: ', ', ', ''); ?>
					</div>
				</div>
			</div>

		<?php endwhile; 
		the_posts_pagination( array(
				'end_size'     => 5,     // количество страниц на концах
				'mid_size'     => 5,
				'prev_text'          => __( 'Previous page'),
				'next_text'          => __( 'Next page'),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
			) );?>
	<?php else : ?>

		<h2 class="center">Нет новостей</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>
</article>

<?php get_footer(); ?>