<?php
//Шаблон резултаты поиска
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
$lots = $arr['lots'];

$index  = $lot['id'];

?>
<div class="container">
	<section class="lots">
		<h2>Результаты поиска по запросу «<span><?= $arr['search'] ?></span>»</h2>
		<ul class="lots__list">
			<?php foreach ($lots as $lot) : ?>

				<?php
				$category = mysqli_query($connection, "SELECT name FROM categories WHERE $lot[category_id] = id");
				$category = mysqli_fetch_assoc($category)['name'];
				?>
				
				<li class="lots__item lot">
					<div class="lot__image">
						<img src=<?= $server_name . 'img/' . $lot['img'] ?> width="350" height="260" alt=<?= $lot['category'] ?>>
					</div>
					<div class="lot__info">
						<span class="lot__category"><?= $category ?></span>
						<h3 class="lot__title">
							<a class="text-link" href="<?= $server_name . 'pages/lot.php?lot=' . $lot['id'] ?>"><?= htmlspecialchars($lot['name']) ?></a></h3>
						<div class="lot__state">
							<div class="lot__rate">
								<span class="lot__amount">Стартовая цена</span>
								<span class="lot__cost"><?= htmlspecialchars(price_format($lot['min_cost'])) ?></span>
							</div>
							<div class="lot__timer timer">
								<!-- Таймер лота -->
								<?= $lot['time_out'] ?>
							</div>
						</div>
					</div>
				</li>
			<?php endforeach ?>
		</ul>
	</section>
	<!--   <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul> -->
</div>