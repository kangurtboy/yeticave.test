<?php
require_once 'lots.php';
require_once 'functions.php';
require_once 'config.php';
//Главная страница
$page_content = template_render('./templates/index.php' , $open_lots);

$content = template_render('./templates/layout.php' , [
	'title' => 'Главная',
	'main_content' => $page_content,
]);

print($content);