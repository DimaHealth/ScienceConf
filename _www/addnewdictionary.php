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
		  <li class="active"><a href="addnewdictionary.php">Справочники</a></li>
		  <li><a href="addnewreport.html">Отчеты</a></li>
		  <li><a href="addnewtables.php">Другие таблицы</a></li>
		  <li><a href="exit.php">Выйти</a></li>
        </ul>
      </nav>
    </header>
	
 <header class="header clearfix">
      <div class="logo">.Simpliste</div>
	  

      <nav class="menu_main">
        <ul>
          <li><a href="countries.php">Страны</a></li>
          <li><a href="cities.php">Города</a></li>
          <li><a href="universities.php">Университеты</a></li>
          <li><a href="faculties.php">Факультеты</a></li>
          <li><a href="cathedrae.php">Кафедры</a></li>
          <li><a href="departments.php">Отделы</a></li>
          <li><a href="units.php">Распределения</a></li>
          <li><a href="employees.php">Сотрудники</a></li>
          <li><a href="posts.php">Должности</a></li>
          <li><a href="degrees.php">Ученые степени</a></li>
          <li><a href="ranks.php">Ученые звания</a></li>
          <li><a href="partners.php">Партнеры</a></li>
          <li><a href="eventtypes.php">Виды мероприятий</a></li>
          <li><a href="status.php">Статусы</a></li>
          <li><a href="levels.php">Уровни</a></li>
		  <li><a href="groups.php">Группы</a></li>
        </ul>
      </nav>
    </header>

</body>
</html>