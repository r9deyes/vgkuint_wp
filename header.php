<!DOCTYPE html>  
<html lang="ru">
  <head>
    <meta charset=<?php bloginfo('charset'); ?> />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<meta name="yandex-verification" content="10a821108ca1e86d" />
<?php	/*
    <link href="<?php bloginfo('template_url')?>/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php bloginfo('template_url')?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php bloginfo('template_url')?>/css/style/style.css" rel="stylesheet" />
*/?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php
/**	<script src="<?php bloginfo('template_url')?>/js/js/header.js"></script>
//	<script src="<?php bloginfo('template_url')?>/js/js/target.js"></script>
	<script src="<?php bloginfo('template_url')?>/js/js/glasses.js"></script>
*/?>	
	<?php wp_head(); ?>
	
  </head>
<body <?php body_class(); ?>>

<header>
	<div class="header_block">
		<div class="header_shap">
			<div class="header_shap_logo">
				<div class="header_shap_logo_left">
					<a href="/index.php">
						<img id="logo1" src="<?php bloginfo( 'template_url' );?>/images/logo.png" alt="<?php bloginfo( 'name' );?>" />
						<p id="block-logo" class="text-right"><?php bloginfo( 'name' );?></p>
						<img id="logo2" src="<?php bloginfo( 'template_url' );?>/images/logo.gif" alt="Логотип ВКУиНТ" />
					</a>
				</div>
				<?php if ( has_nav_menu( "header_menu" )) :?>
				<div class="header_shap_logo_right">
					<ul>
					<?php $mm = wp_get_nav_menu_object(get_nav_menu_locations()['header_menu']); 
	$items=wp_get_nav_menu_items($mm->term_id);
	//$items=wp_get_nav_menu_items('header_menu');
						$l=count($items); $li=0;
						while($li<$l):?>
						<li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
					<?php $li++; endwhile;?>
					</ul>
				</div>
				<?php endif;?>
			</div>
			
			<div class="container">
				<div class="header_shap_text">				
					<div class="textrotator"></div>										
				</div>
			</div>
			
			<div class="header_shap_logo">
				<div class="header_shap_logo_right">
					<div class="address">
						<button class="btn btn-primary btn-lg" id="model_window" data-toggle="modal" data-target="#myModal">Контакты</button>
					</div>
				</div>
			</div>
		</div>
		<video loop="loop" muted="muted" autoplay="autoplay" poster="<?php bloginfo( 'template_url' );?>/video/header.jpg" class="header_video">
		    <source src="<?php bloginfo( 'template_url' );?>/video/header.webm" type="video/webm" />
			<source src="<?php bloginfo( 'template_url' );?>/video/header.mp4" type="video/mp4" />
		</video>
	</div>	
</header>


<!-- Модель окна -->

<div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Контактные данные</h4>
				</div>
				<div class="modal-body">
					<div class="address_window">
											<?php 
						$args = array('post_type'=>'page', 'tag'=>'contacts', 'posts_per_page'=>1);

						// The Query
						$the_query = new WP_Query( $args );
						while ( $the_query->have_posts() ) :
							$the_query->the_post();
							echo the_content();
						endwhile;
						get_template_part('widget/map');
						?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				</div>
			</div>
		</div>
	</div>
</div>