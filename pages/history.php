<?php 
//История просмотров лота
require_once $_SERVER['DOCUMENT_ROOT'] . './functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './lots.php';


$lots_id = json_decode($_COOKIE['history']);
$vached_lots = [];

if(isset ($lots_id)){
	foreach ($lots_id as $id){
	array_push($vached_lots , $open_lots[$id]);
	}
}

$title = 'История просмотров';
$content = template_render('pages/all-lots.php' ,['title'=> $title,
'lots' => $vached_lots,
]);

$page_contetn =  template_render('templates/layout.php' , ['title'=>$title ,
'main_content'=> $content]);

print($page_contetn);
?>