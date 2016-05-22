
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  <title>Партнеры</title>  
  
</head>
<body>

<form action="" method="post" name="r_form2" >


 <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
			<div class="container">
				<nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                   <ul class="nav navbar-nav navbar-right">
						<li><a href="mainform.php">Main</a></li>
						<li><a href="addnewuser.php">Пользователи</a></li>
						<li><a href="tableofevents.php">Мероприятия</a></li><li><a href="tableofeventsFull.php">Мероприятия для Админа</a></li>
						<li class="active"><a href="addnewdictionary.php">Справочники</a></li>
						<li><a href="addnewreport.php">Генерация отчетности</a></li>
						<li ><a href="addnewtables.php">Другие таблицы</a></li>
						<li></li>
						<li><a href="exit.php">Выйти</a></li>
                  </ul>
				</nav>
			</div>
	 </header>
<div class="container">
<header class="container">
    <section class="content">
      <h1></h1>
      <p class="sub-title"><strong></strong> <br /></p>
    </section>
 </header>
 </div>
</form>
</body>
</html>
<?php



if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist";  
//die(var_dump($_GET['action'], $_GET, $_POST));
switch ( $_GET["action"] ) 
{ 
  case "showlist":    // Список всех записей в таблице БД
    show_list(); break; 
  case "addform":     // Форма для добавления новой записи 
    get_add_item_form(); break; 
  case "add":         // Добавить новую запись в таблицу БД
    add_item(); break;
  case "editform":    // Форма для редактирования записи 
    get_edit_item_form(); break; 
  case "update":      // Обновить запись в таблице БД
	update_item(); break; 
  case "delete":      // Удалить запись в таблице БД
    delete_item(); break;
  default: 
    show_list(); 
}

// Функция выводит список всех записей в таблице БД
function show_list() 
{ 

 
$sql = "SELECT * FROM partners";
require("dbconnect.php");
$res = mysqli_query($connect, $sql);

  echo '<h2>Партнеры</h2>'; 
  echo '<div class="col_66">';
    echo '<table border="1" class="table">';      
   
  echo '<tr class="my-bold-font"><th>IDPartner</th><th>Партнер</th><th>Телефон</th>
  <th>Web-сайт</th><th>Email</th><th>Мероприятие</th>
  <th>Кол-во участников</th>
  <th>Ред.</th><th>Удл.</th></tr>'; 
  while ( $item = mysqli_fetch_array( $res ) ) 
  { 
    echo '<tr class="my-bold-font">'; 
	echo '<td>'.$item['IDPartner'].'</td>'; 
    echo '<td>'.$item['Partner'].'</td>'; 
    echo '<td>'.$item['Phone'].'</td>'; 
    echo '<td>'.$item['Website'].'</td>'; 
	echo '<td>'.$item['E-mail'].'</td>'; 
	 $sql3 = "SELECT `EventName` FROM `events` WHERE  IDEvent = ".$item['CodeEvent'];
	$res3 =  mysqli_query($connect, $sql3);
	 echo '<td>'.mysqli_fetch_array( $res3 )['EventName'].'</td>'; 
    echo '<td>'.$item['NumberOfParticipants'].'</td>'; 
    echo '<td><a href="?action=editform&id='.$item['IDPartner'].'">Ред.</a></td>'; 
    echo '<td><a href="?action=delete&id='.$item['IDPartner'].'">Удл.</a></td>'; 
    echo '</tr>'; 
  } 
  echo '</table>';
  echo '<p><a href="'.$_SERVER['PHP_SELF'].'?action=addform">Добавить</a></p>';  
} 


// Функция формирует форму для добавления записи в таблице БД 
function get_add_item_form() 
{ 
echo '<h2>Добавить</h2>'; 
include("templates/addPartner.php");
 
}

// Функция добавляет новую запись в таблицу БД  
function add_item() 
{ 
require("dbconnect.php");
  $Partner = mysqli_escape_string($connect, $_POST['Partner'] ); 
  $Phone = mysqli_escape_string($connect, $_POST['Phone'] ); 
  $Website = mysqli_escape_string($connect, $_POST['Website'] ); 
  $Email = mysqli_escape_string($connect, $_POST['E-mail'] ); 
  $CodeEvent = mysqli_escape_string($connect, $_POST['CodeEvent'] ); 
  $NumberOfParticipants = mysqli_escape_string($connect, $_POST['NumberOfParticipants'] ); 
  $query = " INSERT INTO `partners`(`Partner`, `Phone`,`Website`, `E-mail`,
 `CodeEvent`, `NumberOfParticipants`) 
 VALUES ('$Partner',' $Phone','$Website',
 ' $Email','$CodeEvent','$NumberOfParticipants')"; 
  mysqli_query ($connect, $query ); 
 // die(var_dump($_POST, $_GET, $Partner));
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
}

// Функция формирует форму для редактирования записи в таблице БД 
function get_edit_item_form() 
{ 
  require("dbconnect.php");
  echo '<h2>Редактировать</h2>'; 
  $id = empty($_GET["id"]) ? 0 : intval($_GET["id"]);
  $query = 'select * from partners WHERE IDPartner='.$id; 
  
  $res = mysqli_query($connect ,$query ); 
  $item = mysqli_fetch_array( $res ); 
  include("templates/updatePartner.php");
} 

// Функция обновляет запись в таблице БД  


function update_item() 
{ 
require("dbconnect.php");
$id = mysqli_escape_string($connect, $_GET['IDPartner'] );
  $Partner = mysqli_escape_string($connect, $_POST['Partner'] ); 
  $Phone = mysqli_escape_string($connect, $_POST['Phone'] ); 
  $Website = mysqli_escape_string($connect, $_POST['Website'] ); 
  $Email = mysqli_escape_string($connect, $_POST['E-mail'] ); 
  $CodeEvent = mysqli_escape_string($connect, $_POST['CodeEvent'] ); 
  $NumberOfParticipants = mysqli_escape_string($connect, $_POST['NumberOfParticipants'] ); 
 //  , E-mail = '".$Email."',
//E-mail = '".$Email."'

   $query = "UPDATE partners SET Partner='".$Partner."', Phone ='".$Phone."', Website = '".$Website."',
   CodeEvent = '".$CodeEvent."', NumberOfParticipants = '".$NumberOfParticipants."'
   WHERE IDPartner=".$id;
   mysqli_query ($connect, $query ); 
   print($Email);
 //  die(var_dump($_POST, $_GET, $Email));
  //  die(var_dump($_POST, $_GET, $id));
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 

// Функция удаляет запись в таблице БД 
function delete_item() 
{ 
  require("dbconnect.php");
  $id = empty($_GET["id"]) ? 0 : intval($_GET["id"]);
  $query = "DELETE FROM partners WHERE IDPartner=".$id; 
  mysqli_query ($connect, $query ); 
 // die(var_dump($_POST, $_GET, $id));
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 
  
?>