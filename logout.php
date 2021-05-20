<?php
//Выход ползователя из сайта
session_start();
session_destroy();

header('Location: /');