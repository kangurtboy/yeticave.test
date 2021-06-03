<?php
require_once 'lots.php';
require_once 'functions.php';
require_once 'config.php';
require_once 'data.php';
//Главная страница

$lots_query = mysqli_query($connection , 'SELECT * FROM lots');
$open_lots = mysqli_fetch_all($lots_query, MYSQLI_ASSOC);

// echo '<pre>';
// print_r($open_lots);

$page_content = template_render('./templates/index.php' , $open_lots);

$content = template_render('./templates/layout.php' , [
	'title' => 'Главная',
	'main_content' => $page_content,
	'nav'=> []
]);

print($content);