<?php
/* 
Plugin Name: volga_plugin
Plugin URI: http://shilov.pro/
Version: 0.2
Author: Mikhail Shilov
Description: Кастомизация админки */

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
} 

$dir =  plugin_dir_url(__FILE__);

//change the login logo
function volga_login_logo() {
	global $dir;
	echo <<<EOT
	<style>
		 .login #login h1 a {
		  	background-image: url($dir/images/volga-logo.png) !important;
		  	background-size: 300px 150px !important;
		  	background-position: center center !important;
    	    width: auto !important;  
    	    height: 150px;	
		  }
		</style>
EOT;
}

//change the login url
function volga_login_logo_url() {
    return '/';
}

function volga_login_url_title() {
    return 'модельное агентство VOLGA';
}

//change the admin logo
function volga_admin_icon_logo() {
	global $dir;
	echo <<<EOT
	<style>
		#wpadminbar {
			background-image: url($dir/images/volga_logo_bar.png) !important;
			background-repeat: no-repeat !important;
			background-size: 127px 32px !important;
			background-position: center center !important;
	} 


	 </style>
EOT;
}


//change the footer
function volga_admin_footer() {
echo 'Сайт разработал <font color="red">Шилов Михаил</font> | Телефон: +7 (904) 913-53-94 ';
	
}

function todo_scripts() {
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' );
	wp_enqueue_script('jquery');

	wp_register_script( 'todo_storage', plugins_url( '/js/todo_storage.js', __FILE__ ) );
	wp_enqueue_script('todo_storage');
	
}

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function todo_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'todo_dashboard_widget',         // Widget slug.
                 'To Do List',         // Title.
                 'todo_dashboard_widget_function' // Display function.
        );	
}



//Create the function to output the contents of our Dashboard Widget.

function todo_dashboard_widget_function() {
	$todo_html = <<<EOT
	<div class="check">
    	<p><input type="checkbox" id="b" class="chb"/> <label>Проверить в базе наличие старых адресов</label></p>
    	<p><input type="checkbox" id="c" class="chb"/> <label>Проверить путь abspath.php в папке cforms</label></p>
    	<p><input type="checkbox" id="d" class="chb"/> <label>Заполнить old_url</label></p>
    	<p><input type="checkbox" id="e" class="chb"/> <label>Узнать открывать ли для индексации</label></p>
    	<p><input type="checkbox" id="f" class="chb"/> <label>Карта в контактах</label></p>
    	<p><input type="checkbox" id="g" class="chb"/> <label>Копирайт компании</label></p>
    	<p><input type="checkbox" id="h" class="chb"/> <label>Сохранить все пароли</label></p>
    	<p><input type="checkbox" id="i" class="chb"/> <label>Установить кэширование если сайт большой</label></p>
    	<p><input type="checkbox" id="j" class="chb"/> <label>Проверить название папки на сервере</label></p>
    	<p><input type="checkbox" id="k" class="chb"/> <label>Уточнить с www сайт или без</label></p>
    	<p><input type="checkbox" id="l" class="chb"/> <label>Убрать стандартный заголовок 'еще один сайт на wordpress'</label></p>
    	<p><input type="checkbox" id="m" class="chb"/> <label>Капча во всех формах заявки</label></p>
	</div>
EOT;
	echo $todo_html;
} 
 
//hooks
add_action('login_head', 'volga_login_logo');
add_filter('login_headerurl', 'volga_login_logo_url');
add_filter('login_headertitle', 'volga_login_url_title');
add_action('admin_head', 'volga_admin_icon_logo');
add_action('wp_head', 'volga_admin_icon_logo');
add_filter('admin_footer_text', 'volga_admin_footer');
add_action('wp_dashboard_setup', 'todo_add_dashboard_widgets');
add_action( 'admin_enqueue_scripts', 'todo_scripts' );
