<?php 
require $_SERVER['DOCUMENT_ROOT'] . './config.php';
require $_SERVER['DOCUMENT_ROOT'] . './data.php';
session_start();
$user_is_active = isset($_SESSION['user']);

if($user_is_active){
	$user = $_SESSION['user'];
}

$title = $arr['title'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link href=<?=$server_name . '/css/normalize.min.css'?> rel="stylesheet">
    <link href=<?=$server_name . '/css/style.css'?> rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="main-header__container container">`
        <h1 class="visually-hidden">YetiCave</h1>
        <a class="main-header__logo" href="/">
            <img src=<?=$server_name .'img/logo.svg'?> width="160" height="39" alt="Логотип компании YetiCave">
        </a>
        <form class="main-header__search" method="get" action="https://echo.htmlacademy.ru">
            <input type="search" name="search" placeholder="Поиск лота">
            <input class="main-header__search-btn" type="submit" name="find" value="Найти">
		</form>
		<?if(isset($_SESSION['user'])) :?>
		<a class="main-header__add-lot button" href=<?=$server_name . 'pages/add.php'?>>Добавить лот</a>
		<?endif?>

        <nav class="user-menu">
			<!-- здесь должен быть PHP код для показа аватара пользователя -->
			<?php if($user_is_active) : ?>
			<div class="user-menu__image">
				<img src="<?=$user['avatar']?>" alt="Ползователь">
			</div>
			<div class="user-menu__logged">
				<p><?=$user['name']?></p>
				<a href= <?=$server_name . "logout.php"?>>Выход</a>
			</div>
			<?else : ?>

				<ul class="user-menu__list">
					<li class="user-menu__item">
						<a href=<?=$server_name . 'pages/sign-up.php'?>>Регистрация</a>
					</li>
					<li class="user-menu__item">
						<a href=<?=$server_name . 'pages/login.php'?>>Вход</a>
					</li>
				</ul>
			<?php endif ?>
        </nav>
    </div>
</header>