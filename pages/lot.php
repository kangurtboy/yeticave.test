<?php 
require_once '../lots.php';
require_once '../functions.php';
require_once '../data.php';
require_once '../config.php';

session_start();

$currrent_lot_id = $_GET['lot'];
$currrent_lot = mysqli_query($connection , "SELECT * FROM lots WHERE $currrent_lot_id = id");
$currrent_lot = mysqli_fetch_assoc($currrent_lot);

$category = mysqli_query($connection , "SELECT name FROM categories WHERE $currrent_lot[category_id] = id");
$category = mysqli_fetch_assoc($category)['name'];

$rate_sql = "SELECT users.name , rates.price ,  rates.rate_date FROM users  JOIN rates ON $currrent_lot_id = rates.lot_id WHERE users.id = rates.user_id";
$rates = mysqli_query($connection , $rate_sql);
$rates = mysqli_fetch_all($rates, MYSQLI_ASSOC);

//Сохранение история просмотра лотов в coockies

if (isset($_COOKIE['history'])) {

	$history = json_decode($_COOKIE['history']);
	
} else {

	$history = [];
}


if (!in_array($currrent_lot_id , $history)){
	
	array_push($history , $currrent_lot_id);
	setcookie('history' , json_encode($history), time() + 10000 ,'/');
}
//Валидация поля добавление ставок
if(isset($_POST['cost'])){
	$errors = validate_fields($_POST , ['cost']);
	if(!count($errors)){	
		//Сохранение ставки в бд
		$sql = "INSERT INTO rates (user_id , lot_id , price) VALUES (?,?,?)";	
		$values = [$_SESSION['user']['id'] , $currrent_lot_id , $_POST['cost']];
		mysql_simple($sql , $values);	
	}
}
ob_start();
?>

<!-- Cтраница лота -->

<main>
	<? if($currrent_lot !== null) : ?>

  <section class="lot-item container">
    <h2><?=$currrent_lot['name']?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src=<?=$server_name .'img/'. $currrent_lot['img']?> width="730" height="548" alt="Сноуборд">
        </div>
        <p class="lot-item__category">Категория: <span><?=$category?></span></p>
        <p class="lot-item__description"><?=$currrent_lot['description']?></p>
      </div>
	  <?if(isset($_SESSION['user'])) :?>
      <div class="lot-item__right <?=isset($errors['cost']) ? 'form__item--invalid' : ''?>">
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
		  <?=$currrent_lot['time_out']?>
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?=price_format($currrent_lot['min_cost'])?></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span><?=price_format($currrent_lot['min_cost'])?></span>
            </div>
          </div>
          <form class="lot-item__form"  method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
		</form>
		<span class="form__error"><?=$errors['cost']?></span>
        </div>
        <div class="history">
          <h3>История ставок (<span><?= count($rates) ?></span>)</h3>
          <table class="history__list">
		  <?php 
		  
		  foreach($rates as $rate)

		/* перебор ставок */
		print  (template_render('/templates/bet.php' , $rate));

		 ?>
			
          </table>
        </div>
      </div>
	  <?endif?>
    </div>
  </section>
  <? else : ?>
  
  <h1>404 Страница не найдена</h1>
  <?endif?>
</main>

<?php
$page_content = ob_get_clean();

$content = template_render('templates/layout.php' ,['title'=> $currrent_lot['name'] ,
'nav' => $categories,
'main_content'=> $page_content
]);

print ($content);
