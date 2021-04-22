<?php
$lot = $arr;
require $_SERVER['DOCUMENT_ROOT'] . '/lots.php';
$index  = array_search($lot , $open_lots);
?>
     <li class="lots__item lot">
	 <div class="lot__image">
		 <img src=<?=$lot['img_url']?> width="350" height="260" alt=<?=$lot['category']?>>
	 </div>
	 <div class="lot__info">
		 <span class="lot__category"><?=$lot['category']?></span>
		 <h3 class="lot__title">
			 <a class="text-link" href="<?='pages/lot.php?lot='. $index?>"><?=htmlspecialchars($lot['name'])?></a></h3>
		 <div class="lot__state">
			 <div class="lot__rate">
				 <span class="lot__amount">Стартовая цена</span>
				 <span class="lot__cost"><?=htmlspecialchars( price_format($lot['price']))?></span>
			 </div>
			 <div class="lot__timer timer">
				 <!-- Таймер лота -->
				<?=timer() ?>
			 </div>
		 </div>
	 </div>
 </li>