<!-- Шаблон фиксированый навигации -->
<?php 
$categories = $arr;
?>

<?php if (isset ($categories)) : ?>
<nav class="nav">
    <ul class="nav__list container">
		<?php foreach ($categories as $category) : ?>
      <li class="nav__item">
        <a href="all-lots.html"><?=$category?></a>
	  </li>
	  <?php endforeach ?>
    </ul>
  </nav>
<?php endif ?>
