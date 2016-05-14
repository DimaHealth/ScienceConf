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
<form action="addnewuserscr.php" method="post" name="r_form" >

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
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  <title>Регистрация</title>  
  
</head>

 <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
    	<div class="container">

     <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                        <ul class="nav navbar-nav navbar-right">
								<li ><a href="mainform.php">Main</a></li>
										<li class="active"><a href="addnewuser.php">Пользователи</a></li>
										<li><a href="tableofevents.php">Мероприятия</a></li><li><a href="tableofeventsFull.php">Мероприятия для Админа</a></li>
										<li ><a href="addnewdictionary.php">Справочники</a></li>
										<li><a href="addnewreport.php">Генерация отчетности</a></li>
										<li><a href="addnewtables.php">Другие таблицы</a></li>
										<li></li>
										<li><a href="exit.php">Выйти</a></li>
                        </ul>
     </nav>
	   </div>
	   
    </header>
	
<div class="col_66">
          <h2>Введите логин и пароль</h2>

          <table class="table">
           <tr> 

            <tr>
              <td>
			  <p class="col_50">
              <label for="email" style="color: #fff;">Логин:</label><br/>
              <input type="text" name="r_username" id="email" value="" />
            </p>
			</td>
            </tr>
			
            <tr>
              <td>
			  <p class="col_50">
              <label for="name" style="color: #fff;">Пароль</label><br/>
              <input type="password" name="r_password" id="name" value="" required=" "/>
              </p>
			</td>
            </tr>
			<p class="col_50">
					  <p class="col_50">
              <label for="type"></label></td>
		  <td style=" color: #000;">Тип профиля:<br/>
		  
       <?php
      require_once("dbconnect.php");

$sql = "SELECT * FROM profiletypes";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = CodeProfileType >";

while($arr = mysqli_fetch_array($result_select)){

echo "<option  value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?>
		</td>
		  </tr>
			<tr>
              <td><input type="submit" name="r_send" value="Зарегистрироватся!" /> </td>
            </tr>
          </table>

</form>