<?php

// ваши данные
$db_server = 'localhost';
$db_database = 'satilovk';
$db_user = 'root';
$db_password = '';

// соединение с базой данных
$connection = mysqli_connect ($db_server, $db_user, $db_password, $db_database);
// проверка соединения
if (! $connection) {
	die ('не удается подключится к базе данных');
}
?>
