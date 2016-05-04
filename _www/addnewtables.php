<?php
session_start();
require_once("dbconnect.php");

// Проверяем если существуют данные в сессий.
if(isset($_SESSION['email']) && isset($_SESSION['password']) ){

// Вставляем данные из сессий в обычные переменные
$email = $_SESSION['email'];
$password = $_SESSION['password'];

// Делаем запрос к БД для выбора данных.
$query = " SELECT * FROM profiles WHERE Email = '$email' AND Password = '$password'";
$result = mysqli_query($connect, $query) or die ( "Error : ".mysqli_error($connect) ); 

/* Проверяем, если в базе нет пользователей с такими данными, то выводим сообщение об ошибке */
if(mysqli_num_rows($result) < 1)
{
	echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.php'>главную страницу</a>";
}
else
{


}

}else{
echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.html'>главную страницу</a>";
die();
}
?>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Таблицы-справочники для мероприятий</title>
 </head>
<body>


<center><h1>Справочники</h1></center>

  <header class="header clearfix">
      <div class="logo">.Simpliste</div>

      <nav class="menu_main">
        <ul>
          <li ><a href="mainform.php">Main</a></li>
          <li><a href="addnewuser.php">Пользователи</a></li>
          <li><a href="tableofevents.php">Мероприятия</a></li>
		  <li><a href="addnewdictionary.php">Справочники</a></li>
		  <li><a href="addnewreport.html">Отчеты</a></li>
		  <li class="active"><a href="addnewtables.php">Другие таблицы</a></li>
		  <li><a href="exit.php">Выйти</a></li>
        </ul>
      </nav>
    </header>
	
 <header class="header clearfix">
      <div class="logo">.Simpliste</div>
	  

      <nav class="menu_main">
        <ul>
		  <li><a href="collections.php">Сборники</a></li>
          <li><a href="orders.php">Приказы</a></li>
          <li><a href="orderformations.php">Формирование приказов</a></li>
          <li><a href="mailings.php">Рассылки</a></li>
          <li><a href="marks.php">Оценки</a></li>
          <li><a href="plans.php">Планы</a></li>
          <li><a href="publications.php">Публикации</a></li>
          <li><a href="publicators.php">Публикующиеся</a></li>
          <li><a href="sections.php">Секции</a></li>
        </ul>
      </nav>
    </header>

</body>
</html>