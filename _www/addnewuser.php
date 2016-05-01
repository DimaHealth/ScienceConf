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
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Регистрация</title>  
  
</head>

 <header class="header clearfix">
      <div class="logo">.Simpliste</div>

      <nav class="menu_main">
        <ul>
          <li><a href="mainform.php">Main</a></li>
          <li class="active"><a href="addnewuser.php">Пользователи</a></li>
          <li><a href="tableofevents.php">Мероприятия</a></li>
		  <li><a href="addnewdictionary.php">Справочники</a></li>
		  <li><a href="addnewreport.html">Отчеты</a></li>
		  <li><a href="addnewtables.html">Другие таблицы</a></li>
        </ul>
      </nav>
    </header>
	
<div class="col_66">
          <h2>Введите логин и пароль чтобы Зарегистрироваться</h2>

          <table class="table">
           <tr> 

            <tr>
              <td>
			  <p class="col_50">
              <label for="email">Логин:</label><br/>
              <input type="text" name="r_username" id="email" value="" />
            </p>
			</td>
            </tr>
			
            <tr>
              <td>
			  <p class="col_50">
              <label for="name">Пароль</label><br/>
              <input type="password" name="r_password" id="name" value="" required=" "/>
              </p>
			</td>
            </tr>
			<p class="col_50">
					  <p class="col_50">
              <label for="type"></label></td>
		  <td>Тип профиля:<br/>
		  
       <?php
      require_once("dbconnect.php");

$sql = "SELECT * FROM profiletypes";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = CodeProfileType>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

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