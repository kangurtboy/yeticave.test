<?php
function template_render($template_path , $arr){
	//Шаблонизатор
	ob_start();
	require $template_path;
	$html =  ob_get_clean();
	return $html;
};

function price_format($num)
{
	/* Форматирование цены */
	$min_value = 1000;
	if ($num > $min_value) {
		$formated =  number_format($num, 0, '.', ' ') . " ₽";
		return $formated;
	} else {
		return $num;
	}
};