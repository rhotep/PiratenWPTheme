<?php

if ( function_exists('register_sidebar') ) {

    register_sidebar(array( /*register main menu, you'll have to add submenu widgets to this sidebar*/
		'name' => 'Main Menu',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));

    register_sidebar(array( /*register top panel*/
		'name' => 'Top Panel',
        'before_widget' => '<span id="%1$s" class="widget %2$s">',
        'after_widget' => '</span>',
        'before_title' => '',
        'after_title' => '',
    ));


    register_sidebar(array( /*register right sidebar*/
		'name' => 'Sidebar',
        'before_widget' => '<fieldset id="%1$s" class="widget %2$s">',
        'after_widget' => '</fieldset>',
        'before_title' => '<legend class="widgettitle">',
        'after_title' => '</legend>',
    ));


    register_sidebar(array( /*register footer bar*/
		'name' => 'Bottom Panel',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));

}else{
	echo "Cannot register dynamic sidebars: missing function 'register_sidebar()'";
}
?>
