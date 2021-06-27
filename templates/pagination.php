<?php 
//Пагинация
?>	

<?php if(isset($arr) && count($arr)>1) : ?>
	<ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
	  <?php foreach ($arr as  $id=>$item): ?>
      <li class="pagination-item "><a>1</a></li> <!-- pagination-item-active -->
      <li class="pagination-item"><a href="#"><?=$id?></a></li>
	  <?php endforeach ?>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
<?php endif?>
