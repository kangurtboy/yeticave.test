<?php 
require_once '../lots.php';
require_once '../functions.php';
require_once '../data.php';
require_once '../config.php';

$currrent_lot = $open_lots[$_GET['lot']];
?>

	<!-- Отрисовка шапки -->
	<?=template_render('/templates/header.php' , $user)?>
	<?=template_render('/templates/nav.php' , [])?>

<!-- Cтраница лота -->

<? if($currrent_lot !== null) : ?>
<main>

  <section class="lot-item container">
    <h2><?=$currrent_lot['name']?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src=<?=$server_name . $currrent_lot['img_url']?> width="730" height="548" alt="Сноуборд">
        </div>
        <p class="lot-item__category">Категория: <span><?=$currrent_lot['category']?></span></p>
        <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
          снег
          мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
          снаряд
          отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
          кэмбер
          позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
          просто
          посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
          равнодушным.</p>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
		  <?=timer() ?>
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?=$currrent_lot['price']?></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span><?=$currrent_lot['price'] / 10 ?></span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
        <div class="history">
          <h3>История ставок (<span><?= count($bets) ?></span>)</h3>
          <table class="history__list">
		  <?php 
		  
		  foreach($bets as $bet)

		/* перебор ставок */
		print  (template_render('/templates/bet.php' , $bet));

		 ?>
			
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
<? else : ?>

<h1>404 Страница не найдена</h1>
<?endif?>

<!-- Отрисовка футер -->
<?=template_render('/templates/footer.php', $categories);
?>
</body>
</html>
