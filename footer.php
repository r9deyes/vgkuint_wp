<!-- Подвал сайта -->

<footer>
	<div class="content">
		<div class="container" id="footer">
			<div class="row">
			<?php 
				$args = array('post_type'=>'page', 'tag'=>'contacts', 'posts_per_page'=>3);

				// The Query
				$the_query = new WP_Query( $args );
				$i=3;
				while ( $the_query->have_posts() and $i>0) :
				?>
				<div class="col-md-3">
					<div class="footer_1">
						<div>		
						<?php
							$the_query->the_post();
							echo the_content();
						?>
						
						</div>
					</div>
				</div>
				<?php $i--; endwhile;	?>
             
                <!--
				<div class="col-md-3">
					<div class="footer_text">
						<ol>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
						</ol>
					</div>
				</div>

				<div class="col-md-3">
					<div class="footer_text">
						<ol>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
						</ol>
					</div>
				</div>

				<div class="col-md-3">
					<div class="footer_text">
						<ol>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
							<li><a href="">Ссылки</a></li>
						</ol>
					</div>
				</div>
		        -->
		     </div> 

				<div class="footer">
				<?php if ( has_nav_menu( "banners" )) :$mm = wp_get_nav_menu_object(get_nav_menu_locations()['banners']); 
	$items=wp_get_nav_menu_items($mm->term_id);//				$items=wp_get_nav_menu_items('banners');
				$l=count($items); $li=0;
				$i=4;
				while($li<$l):
				$i=4;	?>
					<div class="row">
					<?php while ($i>0 and $li<$l): 
					$url=$items[$li]->url;?>
						<div class="col-md-3">
						    <a href="<?php echo $url;?>" target="_blank" title="Открыть">							
							<div class="banner">
								<p><?php echo $items[$li]->title;?></p>
								<span><?php echo substr($url,strpos($url,'://')+3,strpos($url.'/','/',8)-7);?></span>
							</div>
							</a>
					    </div>
						<?php $li++; $i--; endwhile;?>
					</div>
					<?php endwhile; wp_reset_postdata();
				endif;?>   
				</div>
		</div>
			<div style="aligin:center;">

<!--LiveInternet counter-->

<script type="text/javascript">
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t21.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
</script><!--/LiveInternet-->
<!-- Yandex.Metrika counter --> 

<script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter46144953 = new Ya.Metrika({ id:46144953, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/46144953" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter 
-->
</div>
	</div>

</footer>

<div class="back-glasses">    <span></span></div><div class="glasses">    <img src="<?php bloginfo('template_url')?>/images/1.png" /></div>
<button onclick="__topFunction()" id="myBtn" title="Вверх">Вверх <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></button>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {__scrollFunction()};

function __scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function __topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<?PHP /*
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/bootstrap.min.js"></script> */?>
<?php wp_footer(); ?>
</body>
</html>