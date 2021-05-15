<?php 
//Шаблон для отрисовка список лотов
require_once $_SERVER['DOCUMENT_ROOT'] . './data.php';
require_once $_SERVER['DOCUMENT_ROOT'] . './config.php';


$data  = $arr;
$lots = $data['lots'];
?>
<main>
 
  <div class="container">
    <section class="lots">
      <h2><?=$data['title']?></h2>
      <ul class="lots__list">
<?php foreach ($lots as $lot) : ?>
        <li class="lots__item lot">
          <div class="lot__image">
            <img src=<?=$server_name . '/' .$lot['img_url']?> width="350" height="260" alt=<?=$lot['name']?>>
          </div>
          <div class="lot__info">
            <span class="lot__category"><?=$lot['category']?></span>
            <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$lot['name']?></a></h3>
            <div class="lot__state">
              <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=$lot['price']?><b class="rub">р</b></span>
              </div>
              <div class="lot__timer timer">
			  <?=timer()?>
              </div>
            </div>
          </div>
        </li>
<?php endforeach ?>		
      </ul>
    </section>
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
  </div>

</main>
