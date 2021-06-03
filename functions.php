<?php
require_once 'userdata.php';
require_once 'config.php';
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
		return $num . " ₽";
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

function search_user_by_email($email , $arr){
	//поиск ползователя по email
	$emails = [];

	foreach ($arr as $user){
		array_push($emails , $user['email']);
	}
	return in_array($email , $emails);

}

function upload_img($img , $upload_path){
	//Проверка и загрузка изображение
	$error = '';
	$allowed_types = ['image/jpeg' , 'image/png' , 'image/bmp', 'image/webp'];
	$img_path = $img['tmp_name'];
	$img_max_size = 5000000;

	if (empty($img_path)) {
		$error = "Загрузите изображение";

	} else if (!in_array($img['type'], $allowed_types)) {
		$error = 'Неверный тип файла';
	}else if($img['size'] > $img_max_size){
		$error = 'Слишком большой файл. <br/>  Загрузите фотографии с размером до 5mb!';
	} else {

		if(!is_dir($upload_path)){
			
			mkdir($upload_path);
		}
		move_uploaded_file($img_path ,  $upload_path .  $img['name']);
	}
	return $error;
}

/**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных
 *
 * @param $link mysqli Ресурс соединения
 * @param $sql string SQL запрос с плейсхолдерами вместо значений
 * @param array $data Данные для вставки на место плейсхолдеров
 *
 * @return mysqli_stmt Подготовленное выражение
 */
function db_get_prepare_stmt($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);

    if ($data) {
        $types = '';
        $stmt_data = [];

        foreach ($data as $value) {
            $type = null;

            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_string($value)) {
                $type = 's';
            }
            else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);

        $func = 'mysqli_stmt_bind_param';
        $func(...$values);
    }

    return $stmt;
}

function mysql_simple ($sql , $arr=[]){
	//Упрашеная функция для работы с MySQL
	require 'config.php';

	$stmt = db_get_prepare_stmt($connection, $sql, $arr);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	if ($result) {
		$received_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
	return $received_data;
}