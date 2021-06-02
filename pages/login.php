<?php 
//Страница авторизации
require_once $_SERVER['DOCUMENT_ROOT'] . './functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './lots.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './userdata.php';

//Валидация

$errors = validate_fields($_POST ,[]);

$email = $_POST['email'];
$password =  $_POST['password'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$saved_email = mysql_simple("SELECT * FROM users WHERE email = ?",[$email]);

	$saved_password = password_verify($password , $saved_email[0]['password']);
	
	if(!$saved_email){
		$errors['email'] = 'Ползователь не найден';
	}elseif(!$saved_password){
		$errors['password'] = "Неверный пароль";
	}
	if(!count($errors)){
		session_start();
		$_SESSION['user'] = $saved_email[0];
		header('Location: /');
	}
}



$login_template = template_render('templates/login.php' ,$errors);

$page_content = template_render('templates/layout.php' , ['title'=> 'Авторизация',
'nav'=> $categories ,
'main_content'=> $login_template]);

print($page_content);

?>
