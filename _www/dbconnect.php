<?php
$server = "localhost"; /* имя хоста (уточняется у провайдера), если работаем на локльном сервере то указываем localhost */
$database = "scienceconferences"; /* Имя базы данных, которую создали */
$username = "first"; /* Имя пользователя БД */
$password = "first"; /* Пароль пользователя, если у пользователя нет пароля то, оставляем пустым */

// Подключение к серверу MySQL
$connect = mysqli_connect($server,$username ,$password , $database) or die ( mysqli_error()); 
// Устанавливаем соединение с базой данных 
mysqli_set_charset($connect,'utf8');
 mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_bin'");
   // mysqli_query($connect,"SET NAMES 'cp1251'"); 
  
?>