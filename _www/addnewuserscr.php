<?php

require("dbconnect.php");
/* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и
 заключаем переданные данные в обычные переменные. Таким образом, мы застраховываемся от
 хостингов, которые не поддерживают глобальные переменные. */
//if(isset($_POST["r_name"])){ $r_name = $_POST["r_name"]; }
if(isset($_POST["r_username"])){ $r_username = $_POST["r_username"]; }
if(isset($_POST["CodeProfileType"])){ $CodeProfileType = $_POST["CodeProfileType"]; }
if(isset($_POST["r_password"])){ $r_password = md5($_POST["r_password"]); }
if(isset($_POST["r_send"])){ $r_send = $_POST["r_send"]; }

/* Проверяем если была нажата кнопка зарегистрироваться.
 Если да, то вводим информацию в БД, иначе, значит что кнопка не была нажата,
 и пользователь зашел на страницу напрямую. Поэтому выводим ему сообщение об этом. */
if(isset($r_send)){
$sql = "SELECT * FROM `profiles` WHERE `Email` = '$r_username'";
$res = mysqli_query($connect, $sql);
if(mysqli_num_rows($res) > 0)
{
	echo "Такой логин уже существует. Вернуться на страницу регистрации  <a href='addnewuser.php'>Go.</a>";
}
else
{
	$query = " INSERT INTO profiles (`CodeProfileType`, `Email`, `Password`)
	VALUES  ('$CodeProfileType','$r_username','$r_password')";
	$result = mysqli_query($connect, $query) or die ( "Error : ".mysqli_error($connect) );

// Если все нормально то выводим сообщение.
	if($result)
	{
		echo"Seccesfull! <a href='index.html'>Go to main.</a> ";
		exit();
	}
}
/* Формируем запрос к БД для ввода данных */

}
else{
	echo "Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. 
Вы ";
}


?>
