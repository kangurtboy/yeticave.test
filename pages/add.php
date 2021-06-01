<?php 
require_once '../functions.php';
require_once '../data.php';
require_once '../config.php';
//Валидация формы

$int_filelds = ['lot-rate' , 'lot-step'];

$errors = validate_fields($_POST , $int_filelds);

if(!empty($_POST)){

	$lot = $_POST;

	if (!in_array($lot['category'] , $categories)){
		//Проверка Категории
		$errors['category']  = "Выберите категорию";
	}

	//Проверка Дата
	$date = date_parse($lot['lot-date']);

	if(!$date['year'] && !$date['month'] && !$date['day']){
		$errors['lot-date'] = 'Введите дату пожалуйста';
	}

	//Проверка Изображение
	$imgage_result = upload_img($_FILES['img'] ,  $documet_root . '/uploads/');
	if($imgage_result){
		$errors['img'] = $imgage_result;
	}
};
session_start();
if(isset($_SESSION['user'])){

	$form_content = template_render('/templates/add_form.php' , $errors);
}else{
	$form_content = template_render('/templates/403.php' , []);
}
$card_content = template_render('/templates/lot.php' , [
	'name'=> $lot['lot-name'],
	'category'=> $lot['category'],
	'price' => $lot['lot-rate'],
	'img_url' => $server_name . '/uploads/' . $_FILES['img']['name']
]);
var_dump($server_name . '/uploads/' . $_FILES['img']['name']);

 
if(!count($errors) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//Отрисовка карточта лота
	print(template_render('/templates/layout.php' , ['title'=> $lot['lot-name'],
	'main_content'=> $card_content,
	'nav'=> $categories]));
}else{
	//Отрисовка формы
	print(template_render('/templates/layout.php' , ['title'=> 'Добавление нового лота',
	'main_content'=> $form_content,
	'nav'=> $categories
	]));
}

?>
