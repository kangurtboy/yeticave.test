<?php 
require_once '../functions.php';
require_once '../data.php';
require_once '../config.php';
?>

<!-- Отрисовка шапки -->
<?=template_render('/templates/header.php' , $user)?>
<?=template_render('/templates/nav.php' , [])?>

<!-- Отрисовка формы -->

<?=template_render('/templates/add_form.php' , [])?>

<!-- Отрисовка футер -->
<?=template_render('/templates/footer.php', $categories);
?>