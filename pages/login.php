<?php 
//Страница авторизации
require_once $_SERVER['DOCUMENT_ROOT'] . './functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './lots.php';

$login_template = template_render('templates/login.php' ,[]);

$page_content = template_render('templates/layout.php' , ['title'=> 'Авторизация',
'nav'=> $categories ,
'main_content'=> $login_template]);

print($page_content);

?>
