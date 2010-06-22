<?php
/**
 * @package WordPress
 * @subpackage Piraten_Berlin_Theme
 */
?>
<!-- begin footer -->
			</div>
			<div id="sidebar">
				<?php 	/* Widgetized sidebar, if you have the plugin installed. */
						/* no need for another sidebar.php :<?php get_sidebar();?> */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) {
						echo "dynamic sidebar ('Sidebar') doesn't work :(";
					} 
				?>
			</div>
			<div class="clear"></div>
		</div>

		<div id="footer">
			<div id="footer_img_right"></div>
			<div id="footer_img_left"></div>		
			<div id="footer_main_content">
			</div>
			<div id="footer_sub_content">
				<?php bloginfo('name'); ?> is proudly powered by
				<a href="http://wordpress.org/">WordPress</a>
				–
				<a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
				and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>
				<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
			</div>
		</div>

		<?php wp_footer(); ?>
</body>
</html>
