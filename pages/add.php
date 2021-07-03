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
	$imgage_result = upload_img($_FILES['img'] ,  $documet_root . '/img/');
	if($imgage_result){
		$errors['img'] = $imgage_result;
	}
};
session_start();
if(isset($_SESSION['user'])){

	$form_content = template_render('/templates/add_form.php' , $errors);
}else{
	$form_content = template_render('/templates/error.php' , ['message'=>'Ошибка: Вы не можете получить доступ к этой странице']);
}


if(!count($errors) && $_SERVER['REQUEST_METHOD'] == 'POST'){

	//Сохранение нового обявление в бд
	$sql  = 'INSERT INTO lots (name , category_id , user_id , description , img , cost, min_cost , time_out) VALUES(? , ? , ? , ? , ? , ? , ? , ?)';
	
	$category_id = mysqli_query($connection , "SELECT `id` FROM `categories` WHERE name = '$_POST[category]' ");
	$category_id = mysqli_fetch_assoc($category_id)['id'];
	$values = [strip_tags($_POST['lot-name']) , $category_id , $_SESSION['user']['id'] , strip_tags ($_POST['message']) , $_FILES['img']['name'] ,$_POST['lot-step'] ,$_POST['lot-rate'] ,$_POST['lot-date']];
	$insert = mysql_simple($sql , $values);

	header('Location: /');
	
}else{
	//Отрисовка формы
	print(template_render('/templates/layout.php' , ['title'=> 'Добавление нового лота',
	'main_content'=> $form_content,
	'nav'=> $categories
	]));
}

?>
