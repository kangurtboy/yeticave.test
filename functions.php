<?php
function template_render($template , $arr){
	//Шаблонизатор
	ob_start();
$template_path = $_SERVER['DOCUMENT_ROOT'] . "/$template";
	if(file_exists($template_path)){

		require $template_path;
		$html =  ob_get_clean();
		return $html;
	}else{
		return 'Файл '. $template_path . ' не найден';
	}
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

function timer(){
 //Таймер для потсчета время лотый
 $current_time = getdate();

 $hours_in_day = 24;
 $minutes_in_hour = 60;

 $hour_left =  $hours_in_day -  $current_time['hours'];
 $minutes_left = $minutes_in_hour - $current_time['minutes'];

 return $hour_left . ' : ' . $minutes_left;

};