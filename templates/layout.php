<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
	<!-- Отрисовка шапки -->
<?=template_render('templates/header.php' , $user)?>
<main class="container">
	<!-- Отрисовка контент страниц -->
<?=template_render('templates/index.php' ,$lots)?>
</main>
<!-- Отрисовка футер -->
<?=template_render('templates/footer.php', $categories);
?>
</body>

</html>
