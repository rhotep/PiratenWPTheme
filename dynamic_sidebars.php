<?php

if ( function_exists('register_sidebar') ) {

    register_sidebar(array( /*register main menu, you'll have to add submenu widgets to this sidebar*/
		'name' => 'Main Menu',
		'description'   => 'This sidebar is meant for a drop down menu. Use the following widgets to customize the menu: Menu Entry, Menu Header, Menu Footer, Menu SubMenu.',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));

    register_sidebar(array( /*register top panel*/
		'name' => 'Top Panel',
		'description'   => 'Only use Menu Entries as widgets for this sidebar.',
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


    register_sidebar(array( /*register bottom panel*/
		'name' => 'Bottom Panel',
		'description'   => 'Only use Menu Entries as widgets for this sidebar.',
        'before_widget' => '<span id="%1$s" class="widget %2$s">',
        'after_widget' => '</span>',
        'before_title' => '',
        'after_title' => '',
    ));

}else{
	echo "Cannot register dynamic sidebars: missing function 'register_sidebar()'";
}
?>
