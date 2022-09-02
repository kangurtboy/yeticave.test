<?php 

//Часовой пояс
	date_default_timezone_set('Asia/Dushanbe');

//Корневой адрес сервера понадобится для подключение ресурсов
	$server_name = 'http://' . $_SERVER['SERVER_NAME'] . '/';
//Корневой путь сервера для подключение php сценарии
	$documet_root = $_SERVER['DOCUMENT_ROOT'];
//подключение к база данных
	$connection = mysqli_connect('localhost' , 'root' , '' , 'yeticave');
	if(!$connection){
		print_r('Ошибка подключение:'. mysqli_connect_error());
	}
?>