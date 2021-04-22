
	<!-- Отрисовка шапки -->
<?=template_render('templates/header.php' , $user)?>
<main class="container">
	<!-- Отрисовка контент страниц -->
<?=template_render('templates/index.php' ,$open_lots)?>
</main>
<!-- Отрисовка футер -->
<?=template_render('templates/footer.php', $categories);
?>


