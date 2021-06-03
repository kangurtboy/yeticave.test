<?php
//Таблица история ставок
$bet = $arr;

?>

<tr class="history__item">
	<td class="history__name"><?=$bet['name']?></td>
	<td class="history__price"><?=price_format($bet['price'])?></td>
	<td class="history__time"><?=$bet['rate_date']?></td>
</tr>