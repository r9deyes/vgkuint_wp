<?php
/*
Template Name: mainPages
*/
//include('design/header.php');
get_header();

//echo var_dump(has_tag('main',get_the_ID()));//:?>

<?php if (is_home() || is_front_page()):
 while ( have_posts() ) : the_post();
			the_content('',true);
			endwhile;?>
<?php else:?>

	<?php while ( have_posts() ) : 
		the_post();
		$meta=get_post_meta( $post->ID );
		if(isset($meta['menu'][0]))
		{
			foreach ($meta['menu'] as $m){
				echo do_shortcode($m);
			}
		}
		else
		{
			echo add_main_menu();
		}
		?>
			 
		<article>
			<div class="container">
			<div class="bookmark">
				<h2><?php if(isset($meta['sc'][0])){echo do_shortcode($meta['sc'][0]).' ';}else{echo '<i class="fa fa-building" aria-hidden="true"></i>';} the_title();?></h2>
			</div>
		<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile;?>
	
 <?php endif;?>
 <?php get_footer();?>


