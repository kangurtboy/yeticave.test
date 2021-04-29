<?php 
require_once '../functions.php';
require_once '../data.php';
require_once '../config.php';
//Валидация формы
$errors = [];
$dict = [
	'lot-name'=> 'Наименование',
	'category'=> 'Категория',
	'message'=> 'Описание',
	'img'=> 'Изображение',
	'lot-rate'=> 'Начальная цена',
	'lot-step'=> 'Шаг ставки',
	'lot-date'=> 'Дата окончания торгов'
];

$int_filelds = ['lot-rate' , 'lot-step'];

if(!empty($_POST)){

	$lot = $_POST;

	foreach($lot as $key=>$fild){
		//Проверка на пустота
		if(empty($fild)){
			$errors[$key] = 'Заполните это поля пожалуйста';
		}
	}

	if (!in_array($lot['category'] , $categories)){
		//Проверка Категории
		$errors['category']  = "Выберите категорию";
	}

	foreach ($int_filelds as $fild){
		//Проверка чисел

		if(!filter_var($lot[$fild] , FILTER_VALIDATE_INT)){
			$errors[$fild] = "Введите только число";
		}
	}
	//Проверка Дата
	$date = date_parse($lot['lot-date']);

	if(!$date['year'] && !$date['month'] && !$date['day']){
		$errors['lot-date'] = 'Введите дату пожалуйста';
	}

	

};



//Отрисовка шапки
 echo template_render('/templates/header.php' , $user);
 echo template_render('/templates/nav.php' , []);


	//Отрисовка карточта лота
	//echo template_render('/templates/lot.php' , []);


	//Отрисовка формы
	echo template_render('/templates/add_form.php' , $errors);


//Отрисовка футер
echo template_render('/templates/footer.php', $categories);

?>
