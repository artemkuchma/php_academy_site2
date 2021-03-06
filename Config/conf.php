<?php
define('DS',DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)) . DS);
define('CONF_DIR', ROOT . 'Config' . DS);
define('CONTROLLER_DIR', ROOT . 'Controller' . DS);
define('LANG_DIR', ROOT . 'Language' . DS);
define('LIB_DIR', ROOT . 'Library' . DS);
define('MODEL_DIR', ROOT . 'Model' . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('WEBROOT_DIR', ROOT . 'Webroot' . DS);


Config::set('site_name_uk', 'Нацiональний антидопiнговий центр' );
Config::set('site_name_en', 'National Anti-Doping Center' );

Config::set('languages', array('en', 'uk'));
//Config::set('routs', array(
  //  'default'=>'',
   // 'admin'=>'admin_'
//));
$request = new Request();


Config::set('default_rout', 'default');
Config::set('default_language', 'uk');
Config::set('default_controller', 'Index');
Config::set('default_action', 'index');
Config::set('default_id', 7);
Config::set('default_id_error_404', 13);
Config::set('default_id_error_403', 14);
Config::set('default_id_error_204', 15);
Config::set('default_id_error_500', 16);
Config::set('not_publish', 136);
Config::set('admin_basic_page', 20);
Config::set('admin_news', 21);
Config::set('contacts', 216);
Config::set('news', 218);
Config::set('search', 224);
Config::set('bread_crumbs_last_element_view', 'no');//текущий элемент в бредкрамбсов - показывать -'yes', не показывать - 'no'
Config::set('materials_per_page',$request->get('materials_per_page') ? $request->get('materials_per_page'):10000 );
Config::set('translation_per_page',$request->get('translation_per_page') ? $request->get('translation_per_page'):10000 );
Config::set('message_per_page',$request->get('message_per_page') ? $request->get('message_per_page'):10000 );
Config::set('log_per_page',$request->get('log_per_page') ? $request->get('log_per_page'):10000 );
Config::set('news_per_page',$request->get('news_per_page') ? $request->get('news_per_page'):10000 );
Config::set('search_per_page',$request->get('search_per_page') ? $request->get('search_per_page'):10000 );
$elements_per_page = array(5,10,15,20,25,50,10000);
Config::set('elements_per_page', $elements_per_page);
Config::set('admin_email', 'test@test6.ua');
Config::set('max_image_size', 500000);
Config::set('max_image_width', 946);
Config::set('max_image_height', 251);
Config::set('img_width', 945);
Config::set('img_height', 250);
Config::set('image_types', array("gif","jpg", "png", "jpeg","JPG"));
Config::set('news_in_block', 3);
Config::set('basic_page_in_block', 3);
Config::set('default_img','SAM_0060.JPG');

$system_doc_menu_disable = array(
    Config::get('default_id') => Config::get('default_id'),
    Config::get('default_id_error_404') => Config::get('default_id_error_404'),
    Config::get('default_id_error_403') => Config::get('default_id_error_403'),
    Config::get('default_id_error_204') => Config::get('default_id_error_204'),
    Config::get('default_id_error_500') => Config::get('default_id_error_500'),
    Config::get('not_publish') => Config::get('not_publish'),
    Config::get('search') => Config::get('search'),
);
Config::set('menu_disable', $system_doc_menu_disable);


// DB Connect

$host = 'test6.ua';
$dbname = 'db_nadc_prod';
$user ='root';
$pass = '';
// user = db_nadc  pass = 3KxJxYAX7QGEzA5E

define('DSN', "mysql:host=$host;dbname=$dbname; charset=UTF8");
define('USER', $user);
define('PASS', $pass);
