<?php 
//Пагинация
$cur_page = $_GET['page'] ?? 1;
$next = $cur_page;
$prev = $cur_page;

if($cur_page > 1){

	$prev = $cur_page - 1;
}
if($cur_page < $arr){

	$next = $cur_page + 1;
}

?>	

<?php if(isset($arr) && $arr>1) : ?>
	<ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a href=<?="/?page=$prev"?>>Назад</a></li>

	  <?php for ($i = 1 ; $i< $arr+1; $i++): ?>
      <li class="pagination-item <?=$cur_page == $i ? 'pagination-item-active': '' ?>"><a href=<?='/?page='. $i?>><?=$i?></a></li> <!-- pagination-item-active -->

	  <?php endfor ?>
      <li class="pagination-item pagination-item-next"><a href=<?="/?page=$next"?>>Вперед</a></li>
    </ul>
<?php endif?>
