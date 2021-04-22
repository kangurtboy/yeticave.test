<?php
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];


//список категории
$categories = ['Доски и лыжи' , "Крепления" , "Ботинки" , "Одежда" , "Инструменты" , "Разное"];

//Загаловок
$title = "Главная";

//Тестовый Ползователь 
$user = [
	"is_auth"=> (bool) rand(0, 1),
	"name"=> 'Константин',
	"avatar"=> $_SERVER['HTTP_REFERER'] .'img/user.jpg'
];