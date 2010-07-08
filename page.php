<?php
/**
 * @package WordPress
 * @subpackage Piraten_Berlin_Theme
 */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div <?php post_class() ?> id="post-<?php the_ID(); ?>">



<div align='right'><?php edit_post_link(__('Edit This')); ?></div>
	<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>
	<div class="meta">
		<?php _e("Filed under:"); ?> <?php the_category(',') ?> &#8212; <?php the_tags(__('Tags: '), ', ', ' &#8212; '); ?>
	</div>

</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>

