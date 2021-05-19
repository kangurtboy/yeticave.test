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
$password_hash = password_hash($password ,PASSWORD_DEFAULT);
$search_email = search_user_by_email($email , $users);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//проверка Email
	if(!$search_email && $email !== ''){

		$errors['email'] = 'Не такого ползователя';

	}elseif(!filter_var($email , FILTER_VALIDATE_EMAIL) && $email !== ''){

		$errors['email'] = 'Введите правилный адрес электроный почту';
	}


	foreach ($users as $user) {
		//поиск ползователя
		if($email === $user['email']){
			if(!password_verify($password, $user['password']) && $password !== ''){
				$errors['password'] = 'Вы ввели неверный пароль';
			}
		}
	if ($user['email'] === $email && password_verify($password, $user['password'])) {
			print('Такой ползовател ест!');
		}
	}
}



$login_template = template_render('templates/login.php' ,$errors);

$page_content = template_render('templates/layout.php' , ['title'=> 'Авторизация',
'nav'=> $categories ,
'main_content'=> $login_template]);

print($page_content);

?>
