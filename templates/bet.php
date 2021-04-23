<?php
$bet = $arr;

?>

<tr class="history__item">
	<td class="history__name"><?=$bet['name']?></td>
	<td class="history__price"><?=$bet['price']?></td>
	<td class="history__time"><?=date('l F Y h:i:s ' ,$bet['ts'])?></td>
</tr>