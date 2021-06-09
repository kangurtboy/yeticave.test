<?php 
//Поиск лотов
require_once '../functions.php';
require_once '../config.php';

if(isset($_GET['search'])){

$sql = "SELECT * FROM lots WHERE MATCH (name , description) AGAINST(?)";
$lots = mysql_simple($sql , [$_GET['search']]);


 if(count($lots)){
	 $result_content = template_render('/templates/search.php' , ['lots'=> $lots ,
	 	'search' => $_GET['search']
	 ]);

 }else{
	 $result_content = template_render('/templates/error.php' , ['message'=> 'По вашему запросу ничего не найдено!']);
 }

 $page_layout = template_render('/templates/layout.php' , ['title'=> 'Поиск: '. $_GET['search'],
	'main_content' => $result_content
]);

}

print($page_layout);
