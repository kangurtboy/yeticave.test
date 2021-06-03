<?php
$lot = $arr;
require $_SERVER['DOCUMENT_ROOT'] . '/lots.php';
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
$index  = $lot['id'];
$category = mysqli_query($connection , "SELECT name FROM categories WHERE $lot[category_id] = id");
$category = mysqli_fetch_assoc($category)['name'];
?>
     <li class="lots__item lot">
	 <div class="lot__image">
		 <img src=<?=$server_name .'img/'. $lot['img']?> width="350" height="260" alt=<?=$lot['category']?>>
	 </div>
	 <div class="lot__info">
		 <span class="lot__category"><?=$category?></span>
		 <h3 class="lot__title">
			 <a class="text-link" href="<?='pages/lot.php?lot='. $index?>"><?=htmlspecialchars($lot['name'])?></a></h3>
		 <div class="lot__state">
			 <div class="lot__rate">
				 <span class="lot__amount">Стартовая цена</span>
				 <span class="lot__cost"><?=htmlspecialchars( price_format($lot['min_cost']))?></span>
			 </div>
			 <div class="lot__timer timer">
				 <!-- Таймер лота -->
				<?=$lot['time_out'] ?>
			 </div>
		 </div>
	 </div>
 </li>