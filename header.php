<?php
/**
 * @package WordPress
 * @subpackage Piraten_Berlin_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory').'/style.css'; ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory').'/style_print.css'; ?>" type="text/css" media="print" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( empty($withcomments) && !is_single() ) {
?>

<?php } else { // No sidebar ?>

<?php } ?>

</style>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


		<div id="header">
			<div id="header_img_right"></div>
			<div id="header_img_left"></div>
			<div id="header_main_content">
				<h1 id="heading"><a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory'); ?>/title_image.php?title=<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>"/></a></h1>
			</div>
			<div id="header_sub_content">
				<div id="main_menu">
					<table>
						<tr>
							<?php 	/* Widgetized menubar, if you have the dynamic sidebar plugin installed. */
								$works=false;
								if(function_exists('dynamic_sidebar')){ 
									$works = dynamic_sidebar('Main Menu');
								} 
								if(!works){
									echo "dynamic sidebars for Main Menu don't work :(";
								}			
							?>	
						</tr>
					</table>
				</div>
				<!--<div class="description"><?php bloginfo('description'); ?></div>-->
				<div id="search_box">
					<form action="http://testing.studentsweb.de/piratenblog/" id="searchform" method="get" role="search">
						<label for="s" class="screen-reader-text">Search for:</label>
						<div class="submit" title="<?php _e('search');?>"><input type="submit" value="" id="searchsubmit"/></div>						
						<div class="text"><input type="text" id="s" name="s" value=""/></div>
					</form> 				
				</div>
			</div>			
			<div id="logo"></div>
			<div id="top_panel">
					<?php 	/* Widgetized sidebar, if you have the plugin installed. */
						$works=false;
						if(function_exists('dynamic_sidebar')){ 
							$works = dynamic_sidebar('Top Panel');
						} 
						if(!works){
							echo "dynamic sidebars for Top Panel don't work :(";
						}
					?>
			</div>
		</div>

		<div id="content">
			<div id="page">
<!-- end header -->
