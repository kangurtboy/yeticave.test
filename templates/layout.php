<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

$content = $arr;

//Отрисовка шапки -->
print (template_render('templates/header.php' ,[ 'title' => $content['title']]));

print (template_render('/templates/nav.php' , $content['nav']));
print ('<main class="container">');

//Отрисовка контент страниц -->
print($content['main_content']);

 print ('</main>');

// Отрисовка футер -->
print ( template_render('/templates/footer.php',[]));


