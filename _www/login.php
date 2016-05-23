<?php
session_start();
require("dbconnect.php");

if(isset($_POST["l_email"])){ $l_email = $_POST["l_email"]; }
if(isset($_POST["l_password"])){ $l_password = md5($_POST["l_password"]); }
if(isset($_POST["l_send"])){ $l_send = $_POST["l_send"]; }

 /* Проверяем если была нажата кнопка Войти. Если да, то сравниваем данные полученные из формы с тем логином и паролем который есть в БД и если они совпадаю то пользователь успешно авторизирован, иначе, выводим сообщение что неправильный логин или пароль. Если кнопка не была нажата, значит что пользователь зашел на страницу напрямую и поэтому выводим ему сообщение об этом. */
if(isset($l_send)){
// делаем запрос к БД для выбора данных.
//print($l_password);
//print($l_email);
$query = " SELECT * FROM profiles WHERE Email = '$l_email' AND Password = '$l_password'";
$result = mysqli_query($connect,$query); 
 //die(var_dump($_POST, $_GET, $l_password));
/* Проверяем, если в базе нет пользователей с такими данными, то выводим сообщение об ошибке */
if(mysqli_num_rows($result) < 1)
{
	echo "Неправильный логин или пароль. Нажмите <a href='index.html'>здесь</a> для того чтобы перейти на страницу авторизации";
}
else{
// Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
$_SESSION['email'] = $l_email;
$_SESSION['password'] = $l_password;
//echo 'Мыло, '.$_SESSION['email'];
//echo 'Пароль, '.$_SESSION['password'];
// Выводим сообщение
echo "Авторизация прошла успешно!";
header("Location: mainform.php");
}
}
else
{
	echo "Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете возвращаться на <a href='index.html'> главную страницу </a>";
}
?>