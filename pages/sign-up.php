<?php
//Регистрация нового ползователя
require_once $_SERVER['DOCUMENT_ROOT'] . './functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './lots.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './userdata.php';
$title = 'Регистрация нового ползователя';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	//валидация
	$errors = validate_fields($_POST,[]);

	if(!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL) && $_POST['email'] !== ''){

		$errors['email'] = 'Введите правилный адрес электроный почту';
	}
	$img_check = upload_img($_FILES['avatar'] ,  $documet_root . '/uploads/');
	if($img_check){
		$errors['avatar'] = $img_check;
	}

//Поис ползователя на бд с таким email
$search_user = "SELECT email from users WHERE email = ?";

$search_result = mysql_simple($search_user,[$_POST['email']]);

if(count($search_result)){
	$errors['email'] = 'Ползовател с таким email - ом зарегистрирован!';
}

	if(!count($errors)){
//Сохранение данных в бд
	$sql = 'INSERT INTO users (avatar , name , email , password , contact_data) VALUES (? , ? , ? , ? , ?)';
	$fields = [$_FILES['avatar']['name'] ,$_POST['name'], $_POST['email'],password_hash($_POST['password'] ,PASSWORD_DEFAULT) , $_POST['message']];
 	$save_user = mysql_simple($sql, $fields);

	header('Location: /');
}
}
$form_page = template_render('./templates/sign-up.php', $errors);

$main_content = template_render('./templates/layout.php' , ['title'=>$title,
'main_content'=> $form_page,
'nav'=> $categories,
]);

//Если ползовател авторизован то перенаправит на главную
session_start();
if(isset($_SESSION['user'])){
	header('Location: /');
}


print($main_content);