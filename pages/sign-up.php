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
}
$form_page = template_render('./templates/sign-up.php', $errors);

$main_content = template_render('./templates/layout.php' , ['title'=>$title,
'main_content'=> $form_page,
'nav'=> $categories,
]);

print($main_content);