<!-- Шаблон фиксированый навигации -->
<?php 
$categories = $arr;
?>

<?php if (isset ($categories)) : ?>
<nav class="nav">
    <ul class="nav__list container">
		<?php foreach ($categories as $id=>$category) : ?>
      <li class="nav__item">
        <a href=<?='/?category=' . ($id + 1) ?>><?=$category?></a>
	  </li>
	  <?php endforeach ?>
    </ul>
  </nav>
<?php endif ?>
