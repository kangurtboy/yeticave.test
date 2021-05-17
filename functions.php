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

function validate_fields (array $all_fields , array $numeric_fields){
	//Валидация полей форм
	
	$errors = [];
	if(!empty($_POST)){

	
		foreach ($numeric_fields as $fild){
			//Проверка чисел
			if(!filter_var($all_fields[$fild] , FILTER_VALIDATE_INT)){
				$errors[$fild] = "Введите только число";
			}
		}
	
		foreach($all_fields as $key=>$fild){
			//Проверка на пустота
			if(empty($fild)){
				$errors[$key] = 'Заполните это поля пожалуйста';
			}
	
			$all_fields[$key] = htmlspecialchars($fild);
		}
	}
	return $errors;
}