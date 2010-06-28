<?php

/**
 * Menu Widgets
 * requires dynamic sidebars
 * @author Andreas Pittrich
 *
 * These widgets are meant to ease the menu administration. 
 * A menu done with these widgets can be administrated through the admin interface by drag and drop.
 * You can edit menu titles and entries or reorder them without modifying any code. 
 * Submenus can be added to an arbitary depth :)
 */



/**
 * MenuEntryWidget Class

 */
class MenuEntryWidget extends WP_Widget {

    function MenuEntryWidget() {
		$widget_ops = array( 'classname' => 'menu_entry', 'description' => 'A link meant to be placed into a menu of some kind. Make sure to use "http://" or "https://" for external links.' );
        parent::WP_Widget(false, $name = 'Menu Entry', $widget_ops);
    }

    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $url = apply_filters('widget_url', $instance['url']);

		if(substr($url, 0, 4)!="http"){
			$url=get_bloginfo('url')."/".$url;
		}
       	
		echo $before_widget;
		if($title){
			echo "$before_title<a href=\"$url\">$title</a>$after_title"; 
			echo $after_widget;
		}
    }

    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['url'] = strip_tags($new_instance['url']);
        return $instance;
    }

    function form($instance) {				
        $title = esc_attr($instance['title']);
		$url= esc_attr($instance['url']);
        ?>
            <p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php _e('Title:'); ?> 
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</label>
				<label for="<?php echo $this->get_field_id('url'); ?>">
					<?php _e('URL:'); ?> 
					<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
				</label>
			</p>
        <?php 
    }

} // class MenuEntryWidget

class SubmenuWidget extends WP_Widget {

    function SubmenuWidget() {
		$widget_ops = array( 'classname' => 'submenu', 'description' => 'Adds a new sidebar used as a submenu. Reload the page for this to have an effect. If you remove a submenu with a subsubmenu, the subsubmenu becomes inactive and can thus be used somewhere else without loss of data. If you wish to remove the subsubmenu sidebar, remove the subsubmenu widget from the inactive widgets panel.' );
        parent::WP_Widget(false, $name = 'Menu Submenu', $widget_ops);	
		$submenus=$this->get_settings();
		foreach($submenus as $key => $submenu){
			if (array_key_exists('title',$submenu)){
			    register_sidebar(array(
					'name' => 'Submenu: '.$submenu['title'],
					'id' => 'submenu-'.$key,
    			    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    			    'after_widget' => '</li>',
    			    'before_title' => '',
    			    'after_title' => '',
    			));
			}
		}
    }

    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $url = apply_filters('widget_title', $instance['url']);
		$class = isset($instance['overlap']) ? 'class="overlap"' : "";

		echo $before_widget; 
        if( $title ){
			echo "$before_title <a href=\"$url\">$title</a> $after_title"; 	
			echo "<ul $class>";
				dynamic_sidebar('submenu-'.$this->number);
			echo "</ul>";
			echo $after_widget;
		}
    }

    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = strip_tags($new_instance['url']);
		$instance['overlap'] = isset($new_instance['overlap']);
        return $instance;
    }

    function form($instance) {				
        $title = esc_attr($instance['title']);
		$url= esc_attr($instance['url']);
		$overlap = esc_attr($instance['overlap']);
        ?>
            <p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />

				<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL:'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked(isset($instance['overlap']) ? $instance['overlap'] : 0); ?> id="<?php echo $this->get_field_id('overlap'); ?>" name="<?php echo $this->get_field_name('overlap'); ?>" />
				<label for="<?php echo $this->get_field_id('overlap'); ?>"><?php _e('Overlapping submenus'); ?></label>
			</p>
        <?php 
    }

} // class SubmenuWidget


class MenuFooterWidget extends WP_Widget {

    function MenuFooterWidget() {
		$widget_ops = array( 'classname' => 'menu_footer', 'description' => 'Add a footer to the menu.' );
        parent::WP_Widget(false, $name = 'Menu Footer', $widget_ops);
    }

    function widget($args, $instance) {		
		extract( $args );
		echo"					
				$before_widget
					<div class=\"left\"></div>
					<div class=\"center\"></div>
					<div class=\"right\"></div>
				$after_widget			
		";
    }

    function update($new_instance, $old_instance) {				
        return $instance;
    }

    function form($instance) {				
		echo "Nothing to configure.";
    }

} // class MenuFooterWidget

class MenuHeaderWidget extends WP_Widget {

    function MenuHeaderWidget() {
		$widget_ops = array( 'classname' => 'menu_header', 'description' => 'Add a header to the menu.' );
        parent::WP_Widget(false, $name = 'Menu Header', $widget_ops);
    }

    function widget($args, $instance) {		
		echo"					
				<li class=\"menu_header\">
					<div class=\"left\"></div>
					<div class=\"center\"></div>
					<div class=\"right\"></div>
				</li>						
		";
    }

    function update($new_instance, $old_instance) {				
        return $instance;
    }

    function form($instance) {				
		echo "Nothing to configure.";
    }

} // class MenuHeaderWidget



add_action('widgets_init', create_function('', 'return register_widget("MenuEntryWidget");'));
add_action('widgets_init', create_function('', 'return register_widget("SubmenuWidget");'));
add_action('widgets_init', create_function('', 'return register_widget("MenuFooterWidget");'));
add_action('widgets_init', create_function('', 'return register_widget("MenuHeaderWidget");'));


?>
