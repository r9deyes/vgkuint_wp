<?php 
function enqueue_styles() {
	wp_enqueue_style( 'test-style', get_stylesheet_uri());
	wp_register_style('defaultcss',  	get_template_directory_uri().'/css/style/default.css');
	wp_register_style('news',  	get_template_directory_uri().'/css/style/news.css');
	//wp_register_style('bootstrap',  	get_template_directory_uri().'/css/bootstrap.css');
	wp_register_style('bootstrap.min',  get_template_directory_uri().'/css/bootstrap.min.css');
	wp_register_style('bootstrap-theme',  get_template_directory_uri().'/css/bootstrap-theme.css');
	wp_register_style('bootstrap-theme.min',  get_template_directory_uri().'/css/bootstrap-theme.min.css');
	wp_register_style('font-awesome',  	get_template_directory_uri().'/css/font-awesome/css/font-awesome.css');
	wp_register_style('font-awesome.min',  get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('defaultcss',  	get_template_directory_uri().'/css/style/default.css');
	//wp_enqueue_style('bootstrap',  	get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('bootstrap.min',  get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-theme',  get_template_directory_uri().'/css/bootstrap-theme.css');
	wp_enqueue_style('bootstrap-theme.min',  get_template_directory_uri().'/css/bootstrap-theme.min.css');
	wp_enqueue_style('font-awesome',  	get_template_directory_uri().'/css/font-awesome/css/font-awesome.css');
	wp_enqueue_style('font-awesome.min',  get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style('news',get_template_directory_uri().'/css/style/news.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	//wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js');
	wp_register_script('bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js');
	wp_register_script('glasses', get_template_directory_uri().'/js/js/glasses.js');
	wp_register_script('header', get_template_directory_uri().'/js/js/header.js');
	wp_register_script('target', get_template_directory_uri().'/js/js/target.js');
	//wp_register_script('jquery.min', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
	

	//wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js');
	wp_enqueue_script('bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js');
	wp_enqueue_script('glasses', get_template_directory_uri().'/js/js/glasses.js');
	wp_enqueue_script('header', get_template_directory_uri().'/js/js/header.js');
	wp_enqueue_script('target', get_template_directory_uri().'/js/js/target.js');
	//wp_enqueue_script('jquery.min', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_menus()
{
	register_nav_menus(array(
							'Профессии'=>'proffessions'
	
	));
}
// Register Navigation Menus
function custom_navigation_menus() {
$args=array(
		'main'=>'Сведения об образовательной организации',
		'professions' =>  'Профессии' ,
		'carousel'=>'Слайд-шоу',
		'specialties'=>'Специальности',
		'vospitatelnaya-deyetelnost'=>'Воспитательная деятельность',
		'banners'=>'banners',
		'header_menu'=>'header_menu',
		'students'=>'Студенту'
) ;
/*$nav_menus=get_terms('nav_menus');
if (is_array($nav_menus)){
foreach($nav_menus as $nm){
	$args[$nm->slug]=$nm->name;
}
}//*/
register_nav_menus( $args);
}
add_action( 'init', 'custom_navigation_menus' );
function post_tag_for_pages(){
	register_taxonomy_for_object_type( 'post_tag', 'page'); //добавление категорий к страницам
}
add_theme_support( 'post-thumbnails', array( 'post' ) );//активации миниатюр для записей
add_action( 'init', 'post_tag_for_pages' );

function add_main_menu($atts=array())
{	$atts=shortcode_atts(array(
	'name'=>'Сведения об образовательной организации',
	'slug'=>'main',
	'icon'=>'[icon name="bars" class="" unprefixed_class=""]'),$atts,'main_menu');
	ob_start();
	?><!-- Меню -->
<?php if ( has_nav_menu( 'main' ) ) : ?>
<nav>
	<div class="container">
	<?php  $mm = wp_get_nav_menu_object(get_nav_menu_locations()['main']); 
	$items=wp_get_nav_menu_items($mm->term_id);
		$l=count($items); $li=0; $i1=round($l/3); $i0=round(($l-$i1)/2); $i2=$l-$i1-$i0;?>
		<div class="bookmark">
			<h2><i class="fa fa-bars" aria-hidden="true"></i> <?php echo $mm->name; ?></h2>
		</div>		
		<div class="row">
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i0>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i0--; $li++;endwhile;?>
				</ul>
			</div>
			
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i1>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i1--; $li++;endwhile;?>
				</ul>
			</div>	
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i2>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i2--; $li++;endwhile;?>
				</ul>
			</div>
		</div>		
	</div>
</nav>
<?php endif;?>
	<?php
$res=ob_get_contents();
ob_end_clean();
return $res;}


function add_carousel_menu($atts=array())
{
	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить
	?><!-- Слайд шоу -->
<?php  if ( has_nav_menu( "carousel" )) :?>
	<article>
	<?php $mm = wp_get_nav_menu_object(get_nav_menu_locations()['carousel']); 
	$items=wp_get_nav_menu_items($mm->term_id);//$items=wp_get_nav_menu_items('carousel');
		$l=count($items); $li=0;
		if ($l>0):?>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		<?php while ($li<$l):?>
			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $li; if ($li==0){echo'" class="active"';}else{echo'"';}?>></li>
		<?php $li++; endwhile;?>
		</ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">		
		<?php $li=0; while ($li<$l):?>
			<div class="item <?php if($li==0){echo 'active';}?>">
				<img src="<?php echo bloginfo('template_url').'/images/slide/'.$li.'.jpg" alt="Слайд '.$li.'"'; ?>>
				<div class="carousel-caption">
					<h2 class="text-center slide-text"><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></a></h2>
				</div>
			</div>
		<?php $li++; endwhile;?>
	  
	      
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
</div>
		<?php endif;?>
</article>
<?php endif;?>		
	<?php
$res=ob_get_contents(); //Перемещаем буфер в переменную
ob_end_clean(); //Очищаем буферы
return $res;
}


function add_specialties_menu($atts=array())
{	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить
	?><!-- Специальности -->
<?php if ( has_nav_menu( "specialties" )) :
	$mm = wp_get_nav_menu_object(get_nav_menu_locations()['specialties']); 
	$items=wp_get_nav_menu_items($mm->term_id);//$mm = wp_get_nav_menu_object('specialties'); ?>
<article>
	<div class="container">
		<div class="bookmark">
			<h2><i class="fa fa-bookmark" aria-hidden="true"></i><?php echo $mm->name;?></h2>
		</div>
		<?php //$items=wp_get_nav_menu_items('specialties');
		$l=count($items); $li=0;
		$i=3;
		while($li<$l):
			$i=3;	?>
			<div class="row" <?php if ($li<3) {echo 'id="specialty-top"';}?>>
			<?php while ($i>0 and $li<$l): ?>
			<div class="col-md-4">
				<a href="<?php echo $items[$li]->url; ?>"> 
					<div class="specialty">
						<div class="specialty_icon" id="icon_<?php echo ($li%10+1);?>">
							<img src="<?php echo bloginfo('template_url').'/images/icon/spec/'.($li+1).'.png';?>" />
						</div>
						<div class="specialty_text">
							<p class="text-right"><?php echo $items[$li]->title;?></p>
						</div>
					</div>
				</a>
			</div>
		

			<?php $li++; $i--; endwhile;?>		
		</div>
		<?php endwhile;?>
	</div>
</article>
<?php endif;?>
<?php
$res=ob_get_contents();
ob_end_clean();
return $res;
}


function add_profession_menu()
{	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить?>
<!-- Профессии -->
<?php if ( has_nav_menu( "professions" )) :
	$mm = wp_get_nav_menu_object(get_nav_menu_locations()['professions']); 
	$items=wp_get_nav_menu_items($mm->term_id);//$mm = wp_get_nav_menu_object('professions'); ?>
<article>
	<div class="container">
		<div class="bookmark">
			<h2><i class="fa fa-bookmark-o" aria-hidden="true"></i><?php echo $mm->name;?></h2>
		</div>
		<?php //$items=wp_get_nav_menu_items('professions');
		$l=count($items); $li=0;
		$i=3;
		while($li<$l):
			$i=3;	?>
			<div class="row" <?php if ($li<3) {echo 'id="specialty-top"';}?>>
			<?php while ($i>0 and $li<$l): ?>
			<div class="col-md-4">
				<a href="<?php echo $items[$li]->url; ?>"> 
					<div class="specialty professions">
						<div class="professions_icon specialty_icon" id="icon_<?php echo ($li+5)%10+1;?>">
							<img src="<?php echo bloginfo('template_url').'/images/icon/prof/'.($li+1).'.png';?>" />
						</div>
						<div class="specialty_text professions_text">
							<p class="text-right"><?php echo $items[$li]->title;?></p>
						</div>
					</div>
				</a>
			</div>
		

			<?php $li++; $i--; endwhile;?>		
		</div>
		<?php endwhile;?>
	</div>
</article>
<?php endif;?>
<?php
$res=ob_get_contents();
ob_end_clean();
return $res;}


function add_vospitatelnaya_deyetelnost($atts=array())
{	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить?>
<!-- Воспитательная деятельность -->

<?php if ( has_nav_menu( 'vospitatelnaya-deyetelnost' )) :
	$mm = wp_get_nav_menu_object(get_nav_menu_locations()['vospitatelnaya-deyetelnost']); 
	$items=wp_get_nav_menu_items($mm->term_id);//$mm = wp_get_nav_menu_object('vospitatelnaya-deyetelnost'); 
			$l=count($items); $li=0; $i1=round($l/3); $i0=round(($l-$i1)/2); $i2=$l-$i1-$i0;?>
<article>
	<div class="container">
		<div class="bookmark">
			<h2><i class="fa fa-user" aria-hidden="true"></i> <?php echo $mm->name; ?></h2>
		</div>		
		<div class="row">
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i0>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i0--; $li++;endwhile;?>
				</ul>
			</div>
			
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i1>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i1--; $li++;endwhile;?>
				</ul>
			</div>	
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i2>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i2--; $li++;endwhile;?>
				</ul>
			</div>
		</div>	
	</div>
</article>
<?php endif;?>
<?php
$res=ob_get_contents();
ob_end_clean();
return $res;}


function add_last_news_preview($atts=array())
{
	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить	?><!-- Новости -->
<?php
$newsOb=get_category_by_slug('news'); ?>
<article>
	<div class="fon">
		<div class="container">
			<div class="bookmark">
				<h2><i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php echo get_cat_name($newsOb->term_id);?></h2>
			</div>
<?php 	$args = array(	'post_type'		=>'post', 
				'cat'	=>$newsOb->term_id, 
				'posts_per_page'=>3
				);
		$my_query = new WP_Query($args); 
		$l=count($items); $li=0;
		$i=0;	?>
		<div class="row">
		<?php				
		while ($my_query->have_posts() and $i<3):	$i++; $my_query->the_post();
				?>
			
				<div class="col-md-4">
					
					<a href="<?php the_permalink();?>">
						<div class="new">
							<h3><?php the_title(); ?></h3>
							<div class="new-fon">
							<center><?php $img=get_the_post_thumbnail(null,array(270,150)); if ($img)
							{
								echo $img;
							}
							else
							{
								echo '<div style="width:270px; height:150px;">'.the_content(' ').'</div>';
							}?>
							</center>
							</div>
						</div>
					</a>					
					
				</div>
				<?php endwhile;?>
				<div>
					<p class="text-center"><a href="<?php echo get_category_link($newsOb->term_id);?>">Все новости</a></p>
				</div>
			</div>
		</div>
	</div>
</article>
<?php
$res=ob_get_contents();
ob_end_clean();
return $res;}


function add_priem_kom($atts=array())
{	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить
	?>
	<!-- Приемная комиссия -->
<article>
	<div class="container">
		<div class="bookmark">
			<h2><i class="fa fa-users" aria-hidden="true"></i> Приемная комиссия</h2>
		</div>
<?php 	$args = array(	'post_type'		=>'page', 
				'tag'	=>'priem-kom', 
				'posts_per_page'=>3,
				'order'=>'ASC',
				'orderby' => 'name'
				);
		$my_query = new WP_Query($args); 
		$l=count($items);
		$i=0;	?>
		<div class="row">
		<?php while ($my_query->have_posts() and $i<3):	$i++; $my_query->the_post(); ?>
			<div class="col-md-4">
				<div class="info">
					<h3><?php the_title(); ?></h3>
					<div>
						<?php the_content(' '); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
			
		</div>
		
		<div><?php $args = array(
			'name'           => 'priem-kom',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1
);
		$my_posts = get_posts( $args );?>
			<p class="text-center"><a href="<?php if (isset($my_posts[0])){echo get_page_link($my_posts[0]->ID);}?>">Подробнее</a></p>
		</div>
		
	</div>
</article>
<?php
$res=ob_get_contents();
ob_end_clean();
return $res;}


function add_simple_menu($atts=array())
{	ob_start(); //Буферезуем поток вывода, т.к. ф-ции шорткодов должны возвращать значение, а не выводить
	$atts=shortcode_atts(array(
	'name'=>'Меню',
	'slug'=>'new_menu',
	'icon'=>'[icon name="list-alt" class="" unprefixed_class=""]'),$atts,'simple_menu');
	
	if ( has_nav_menu( $atts['slug'] )) :
	$mm = wp_get_nav_menu_object(get_nav_menu_locations()[$atts['slug']]); 
	$items=wp_get_nav_menu_items($mm->term_id);
			$l=count($items); $li=0; $i1=round($l/3); $i0=round(($l-$i1)/2); $i2=$l-$i1-$i0;?>
<article>
	<div class="container">
		<div class="bookmark">
			<h2><?php echo do_shortcode($atts['icon']); echo $mm->name; ?></h2>
		</div>		
		<div class="row">
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i0>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i0--; $li++;endwhile;?>
				</ul>
			</div>
			
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i1>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i1--; $li++;endwhile;?>
				</ul>
			</div>	
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i2>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i2--; $li++;endwhile;?>
				</ul>
			</div>
		</div>	
	</div>
</article>
<?php else:
	register_nav_menus( array($atts['slug']=>$atts['name'],));
endif;
$res=ob_get_contents();
ob_end_clean();
return $res;}


function add_student_menu($atts=array())
{	$atts=shortcode_atts(array(
	'name'=>'Студенту',
	'slug'=>'students',
	'icon'=>'[icon name="bars" class="" unprefixed_class=""]'),$atts,'student_menu');
	ob_start();
	?><!-- Студенту -->
<?php if ( has_nav_menu( 'students' ) ) : ?>
<nav>
	<div class="container">
	<?php  $mm = wp_get_nav_menu_object(get_nav_menu_locations()['students']); 
	$items=wp_get_nav_menu_items($mm->term_id);
		$l=count($items); $li=0; $i1=round($l/3); $i0=round(($l-$i1)/2); $i2=$l-$i1-$i0;?>
		<div class="bookmark">
			<h2><i class="fa fa-bars" aria-hidden="true"></i> <?php echo $mm->name; ?></h2>
		</div>		
		<div class="row">
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i0>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i0--; $li++;endwhile;?>
				</ul>
			</div>
			
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i1>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i1--; $li++;endwhile;?>
				</ul>
			</div>	
			<div class="col-md-4">
				<ul class="menu">
				<?php while ($i2>0 and $li<$l): ?>
				    <li><a href="<?php echo $items[$li]->url.'">'.$items[$li]->title;?></a></li>
				<?php $i2--; $li++;endwhile;?>
				</ul>
			</div>
		</div>		
	</div>
</nav>
<?php endif;?>
	<?php
$res=ob_get_contents();
ob_end_clean();
return $res;}

/*
*
* SHORTCODES
*
*/

add_shortcode('main_menu','add_main_menu');
add_shortcode('last_news_preview','add_last_news_preview');
add_shortcode('priem_kom','add_priem_kom');
add_shortcode('carousel_menu','add_carousel_menu');
add_shortcode('specialties_menu','add_specialties_menu');
add_shortcode('professions_menu','add_profession_menu');
add_shortcode('vospitatelnaya_deyetelnost_menu','add_vospitatelnaya_deyetelnost');
add_shortcode('simple_menu','add_simple_menu');
add_shortcode('student_menu','add_student_menu');
?>