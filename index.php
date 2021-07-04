<?php
//Главная страница
require_once 'lots.php';
require_once 'functions.php';
require_once 'config.php';
require_once 'data.php';
//Пагинация
$cur_page = $_GET['page'] ?? 1;
$items_count = mysql_simple('SELECT count(*) FROM lots WHERE time_out >= CURRENT_DATE()' , [])[0]['count(*)'];
$items_limit = 6;
$page_count = (int) ceil($items_count / $items_limit); 
$offset = ($cur_page - 1) * $items_limit;



$lots_query = mysqli_query($connection , "SELECT * FROM lots WHERE time_out >= CURRENT_DATE() ORDER BY crate_date DESC LIMIT $items_limit OFFSET $offset");

//Сортировка по категории
$category = $_GET['category'];
$category_count = mysql_simple("SELECT count(*) from categories" , [])[0]['count(*)'];

if(isset($category) && $category > 0 && $category <= $category_count){
	$lots_query = mysqli_query($connection , "SELECT * FROM lots WHERE time_out >= CURRENT_DATE() AND $category = category_id  ORDER BY crate_date DESC LIMIT $items_limit OFFSET $offset");
}

if($lots_query){

	$open_lots = mysqli_fetch_all($lots_query, MYSQLI_ASSOC);
}

$page_content = template_render('./templates/index.php' , $open_lots);

$content = template_render('./templates/layout.php' , [
	'title' => 'Главная',
	'main_content' => $page_content,
	'nav'=> [],
	'pagination' => $page_count
]);

if($cur_page < 1 || $cur_page > $page_count){
	$content = template_render('./templates/layout.php' , [
		'title' => 'Страница не найдена',
		'main_content' => template_render('./templates/error.php', ['message'=> 'Страница не найдена']),
	]);
}

print($content);
