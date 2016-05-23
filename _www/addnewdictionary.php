<?php
session_start();
require("dbconnect.php");

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
 <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <!-- CSS
         ================================================== -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <!-- Animation -->
        <link rel="stylesheet" href="css/animate.css" />
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/owl.theme.css"/>
        <!-- Pretty Photo -->
        <link rel="stylesheet" href="css/prettyPhoto.css"/>
        <!-- Main color style -->
        <link rel="stylesheet" href="css/red.css"/>
        <!-- Template styles-->
        <link rel="stylesheet" href="css/custom.css" />
        <!-- Responsive -->
        <link rel="stylesheet" href="css/responsive.css" />
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		  <link rel="stylesheet" href="css/demo.css">

  <!-- Стили для адаптивного фонового изображения -->
  <link rel="stylesheet" href="css/styleimg.css">
	
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <title>Таблицы-справочники для мероприятий</title>
 </head>
<body>


<center><h1>Справочники</h1></center>
 <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
    	<div class="container">

     <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                        <ul class="nav navbar-nav navbar-right">
								<li><a href="mainform.php">Main</a></li>
										<li><a href="addnewuser.php">Пользователи</a></li>
										<li><a href="tableofevents.php">Мероприятия</a></li><li><a href="tableofeventsFull.php">Мероприятия для Админа</a></li>
										<li class="active"><a href="addnewdictionary.php">Справочники</a></li>
										<li><a href="addnewreport.php">Генерация отчетности</a></li>
										<li> <a href="addnewtables.php">Другие таблицы</a></li>
										<li></li>
										<li><a href="exit.php">Выйти</a></li>
                        </ul>
     </nav>
	   
	     <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
         <ul class="nav navbar-nav navbar-right">
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
	  </div>
    </header>


 

</body>
</html>