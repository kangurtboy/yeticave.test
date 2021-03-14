<?php ob_start();
$categories = ['Доски и лыжи' , "Крепления" , "Ботинки" , "Одежда" , "Инструменты" , "Разное"];

$lots = [
	['name' => "2014 Rossignol District Snowboard",
		'category' => "Доски и лыжи",
		'price' => 10999,
		'img_url' =>	"img/lot-1.jpg"
	],

	['name' =>  "DC Ply Mens 2016/2017 Snowboard",
	'category' => "Доски и лыжи",
	'price' => 159999,
	'img_url' => "img/lot-2.jpg"
	],	

	['name' => "Крепления Union Contact Pro 2015 года размер L/XL" ,
	'category' => "Крепления",
	'price' => 8000,
	'img_url' => "img/lot-3.jpg"	
	],	

	['name' =>  "Ботинки для сноуборда DC Mutiny Charocal",
	'category' => "Ботинки",
	'price' => 10999,
	'img_url' => "img/lot-4.jpg"	
	],

	['name' =>  "Куртка для сноуборда DC muty Charocal",
	'category' => "Одежда",
	'price' => 7500,
	'img_url' => "img/lot-5.jpg"
	],

	['name' =>  "Маска Oakley Canopy",
	'category' => "Разное",
	'price' => 5400,
	'img_url' => "img/lot-6.jpg"
	]
];
?>
<section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="promo__item promo__item--attachment">
                <a class="promo__link" href="all-lots.html">Крепления</a>
            </li>
            <li class="promo__item promo__item--boots">
                <a class="promo__link" href="all-lots.html">Ботинки</a>
            </li>
            <li class="promo__item promo__item--clothing">
                <a class="promo__link" href="all-lots.html">Одежда</a>
            </li>
            <li class="promo__item promo__item--tools">
                <a class="promo__link" href="all-lots.html">Инструменты</a>
            </li>
            <li class="promo__item promo__item--other">
                <a class="promo__link" href="all-lots.html">Разное</a>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
			<!-- Перебор обявлении -->
			<?php foreach ($lots as $lot): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src=<?=$lot['img_url']?> width="350" height="260" alt=<?=$lot['category']?>>
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$lot['category']?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$lot['name']?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=price_format($lot['price'])?></span>
                        </div>
                        <div class="lot__timer timer">

                        </div>
                    </div>
                </div>
			</li>
			<?php endforeach ?> 
        </ul>
	</section>
	<?php $main_content = ob_get_clean(); ?>