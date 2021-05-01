<?php 
require_once '../functions.php';
require_once '../data.php';
require_once '../config.php';
//Валидация формы
$errors = [];


$int_filelds = ['lot-rate' , 'lot-step'];

if(!empty($_POST)){

	$lot = $_POST;

	foreach ($int_filelds as $fild){
		//Проверка чисел

		if(!filter_var($lot[$fild] , FILTER_VALIDATE_INT)){
			$errors[$fild] = "Введите только число";
		}
	}

	foreach($lot as $key=>$fild){
		//Проверка на пустота
		if(empty($fild)){
			$errors[$key] = 'Заполните это поля пожалуйста';
		}

		$lot[$key] = htmlspecialchars($fild);
	}

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
	$allowed_types = ['image/jpeg' , 'image/png' , 'image/bmp', 'image/webp'];
	$img = $_FILES['img'];
	$img_path = $img['tmp_name'];
	$img_max_size = 5000000;

	if (empty($img_path)) {
		$errors['img'] = "Загрузите изображение";

	} else if (!in_array($img['type'], $allowed_types)) {
		$errors['img'] = 'Неверный тип файла';
	}else if($img['size'] > $img_max_size){
		$errors['img'] = 'Слишком большой файл. <br/>  Загрузите фотографии с размером до 5mb!';
	} else {

		if(!is_dir($documet_root . './uploads/')){
			
			mkdir($documet_root . './uploads/');
		}
		move_uploaded_file($img_path ,  $documet_root . './uploads/' . $img['name']);
	}
};

//Отрисовка шапки
 echo template_render('/templates/header.php' , $user);
 echo template_render('/templates/nav.php' , []);

if(!count($errors) && $_SERVER['REQUEST_METHOD'] == 'POST'){
		//Отрисовка карточта лота
	echo template_render('/templates/lot.php' , [
		'name'=> $lot['lot-name'],
		'category'=> $lot['category'],
		'price' => $lot['lot-rate'],
		'img_url' => $server_name . '/uploads/' . $img['name']
	]);
}else{
	echo template_render('/templates/add_form.php' , $errors);
}


	//Отрисовка формы


//Отрисовка футер
echo template_render('/templates/footer.php', $categories);

?>
