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
  <title>Главная страница</title>  
  
</head>

<body>

<div class="container">

    <header class="header clearfix">
      <div class="logo">.Simpliste</div>

      <nav class="menu_main">
        <ul>
          <li class="active"><a href="mainform.php">Main</a></li>
          <li><a href="addnewuser.php">Пользователи</a></li>
          <li><a href="tableofevents.php">Мероприятия</a></li>
		  <li><a href="addnewdictionary.php">Справочники</a></li>
		  <li><a href="addnewreport.html">Отчеты</a></li>
		  <li><a href="addnewtables.html">Другие таблицы</a></li>
		   <li></li>
		  <li><a href="exit.php">Выйти</a></li>
        </ul>
      </nav>
    </header>

 <div class="info">
      <article class="hero clearfix">
        <div class="col_100">
          <h1>Simplest solution for your simple tasks</h1>
          <p>You don't always need to make difficult work of running management system with administrative panel to have a web site. “Simpliste” is a very simple and easy to use HTML template for web projects where you only need to create one or couple of pages with simple layout. If you are working on a lightweight information page with as less efforts for you to code and as less kilobytes  for the user to download as possible, “Simpliste” is what you need.</p>
          <p>No CMS required and it's free. Clean code will make your task even easier. HTML5 and CSS3 bring all their features for your future site. This template has skins which you can choose from. No images are used for styling.</p>
          <p>Are you worried about convenience of your site users with mobile devices? “Simpliste” responds to the width of user's device and makes information more accessible.</p>
        </div>
      </article>

<div class="col_66">
          <h2>CSS classes table</h2>

          <table class="table">
            <tr>
              <th>Class</th>
              <th>Description</th>
            </tr>

            <tr>
              <td><code>.col_33</code></td>
              <td>Column with 33% width</td>
            </tr>
            <tr>
              <td><code>.col_50</code></td>
              <td>Column with 50% width</td>
            </tr>
            <tr>
              <td><code>.col_66</code></td>
              <td>Column with 66% width</td>
            </tr>
            <tr>
              <td><code>.col_100</code></td>
              <td>Full width column with proper margins</td>
            </tr>
            <tr>
              <td><code>.clearfix</code></td>
              <td>Use after or wrap a block of floated columns</td>
            </tr>
            <tr>
              <td><code>.left</code></td>
              <td>Left text alignment</td>
            </tr>
            <tr>
              <td><code>.right</code></td>
              <td>Right text alignment</td>
            </tr>
            <tr>
              <td><code>.center</code></td>
              <td>Centered text alignment</td>
            </tr>
            <tr>
              <td><code>.img_floatleft</code></td>
              <td>Left alignment for images in content</td>
            </tr>
            <tr>
              <td><code>.img_floatright</code></td>
              <td>Right alignment for images in content</td>
            </tr>
            <tr>
              <td><code>.img</code></td>
              <td>Makes image change its width when browser window width is changed</td>
            </tr>
          </table>
 
</body>
</html>
