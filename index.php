<?php

//include('design/header.php');
get_header();

 if ( is_home() && ! is_front_page() ) : 
	while ( have_posts() ) : the_post();
//if ($_GET == false){
    //include ("content/default.php");
/*} else {
	$page = $_GET['id'] . '.php';
	if (is_file('content/' . $page) == false){
	include ('content/default.php');
	} else {
		include ("content/$page");
  }
}*/	
		the_content();
	endwhile;
 endif;

//include('design/footer.php');
get_footer();

?>