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
		echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.html'>главную страницу</a>";
	}

} else {
	echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.html'>главную страницу</a>";
	die();
}
?>
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
  <title>Планы</title>  
  
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
						<li ><a href="addnewdictionary.php">Справочники</a></li>
						<li class="active"><a href="addnewreport.php">Генерация отчетности</a></li>
						<li ><a href="addnewtables.php">Другие таблицы</a></li>
						<li></li>
						<li><a href="exit.php">Выйти</a></li>
                  </ul>
				</nav>
				<nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                   <ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="genPlans.php">Планы</a></li>
						<li><a href="genOrders.php">Приказы</a></li>
						<li><a href="genReports.php">Отчеты</a></li>
						<li><a href="genPeriodReport.php">Отчет за  период  </a></li>
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

if ( !isset( $_GET["action"] ) ) $_GET["action"] = "addform";  
//die(var_dump($_GET['action'], $_GET, $_POST));
switch ( $_GET["action"] ) 
{ 
 // case "showlist":    // Список всех записей в таблице БД
  //  show_list(); break; 
  case "addform":     // Форма для добавления новой записи 
    get_add_item_form(); break; 
  case "add":         // Добавить новую запись в таблицу БД
    add_item(); break;
 
}

// Функция выводит список всех записей в таблице БД
// function show_list() 
// { 
  
  // echo '<p><a href="'.$_SERVER['PHP_SELF'].'?action=addform">Сгенерировать отчет</a></p>';  
// } 


// Функция формирует форму для добавления записи в таблице БД 
function get_add_item_form() 
{ 
 echo '<h2>Генерация планов</h2>'; 
include("templates/addGenPlan.php");
 
}


// Функция добавляет новую запись в таблицу БД  
function add_item() 
{ 
require("dbconnect.php");
include_once 'Header.php';


// New Word Document
echo date('H:i:s'), ' Create new PhpWord object', EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$header = array('size' => 16, 'bold' => true, 'halign' => 'center');



$CodePlan = mysqli_escape_string($connect, $_POST['CodePlan'] ); 

	$sql2 = "SELECT `CalendarYear` FROM `plans` WHERE IDPlan = ".$CodePlan;
	$res2 =  mysqli_query($connect, $sql2);
	
 $sql = "SELECT  `EventName`, `StartDate`, `ExpirationDate`,
 `Cathedra`, `EventType`, `FIO`, `employees`.`Phone`, `employees`.`Email`, `Post`,
 `Status`, `Level`, `Website`, `CodePreviosEvent` FROM (`events`  INNER JOIN `eventtypes`
 ON `CodeEventType` = `IdEventType` INNER JOIN `status`
 ON `CodeStatus` = `IdStatus` INNER JOIN `levels`
 ON `CodeLevel` = `IdLevel` INNER JOIN `employees` 
 ON `CodeExecutiveSecretary` = `IdEmployee` INNER JOIN `cathedrae`
 ON employees.CodeCathedra = `IdCathedra` INNER JOIN `posts`
 ON `CodePost` = `IdPost`) WHERE `CodePlan`=".$CodePlan;
$res = mysqli_query($connect, $sql);

// 2. Advanced table
$section->addTextBreak(1);
$TableName = "План мероприятий на ".mysqli_fetch_array( $res2 )['CalendarYear']." год";
$section->addText(htmlspecialchars("{$TableName}"), $header);

$styleTable = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80);
$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$styleCell = array('valign' => 'center');
$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fontStyle = array('bold' => true, 'align' => 'center');
$phpWord->addTableStyle($TableName, $styleTable, $styleFirstRow);
$table = $section->addTable($TableName);

$table->addRow(900);
	$table->addCell(2000, $styleCell)->addText(htmlspecialchars('Мероприятие'), $fontStyle);
	$table->addCell(2000, $styleCell)->addText(htmlspecialchars('Дата проведения'), $fontStyle);
	$table->addCell(2000, $styleCell)->addText(htmlspecialchars('Ответственный секретарь'), $fontStyle);
	$table->addCell(2000, $styleCell)->addText(htmlspecialchars('Сайт'), $fontStyle);
	$table->addCell(2000, $styleCell)->addText(htmlspecialchars('Предыдущее мероприятие'), $fontStyle);

  while ( $item = mysqli_fetch_array( $res ) ) 
  { 
    
		$table->addRow();
		$table->addCell(2000)->addText(htmlspecialchars("{$item['Level']}"." \n "
														."{$item['Status']}"." \n "
														."{$item['EventType']}"." \n "
														."\"{$item['EventName']}\""));
		$table->addCell(2000)->addText(htmlspecialchars("{$item['StartDate']}"." - \n"
														."{$item['ExpirationDate']}"));
		$table->addCell(2000)->addText(htmlspecialchars("{$item['FIO']}"." \n"
														."{$item['Post']}"." \n"
														."кафедры {$item['Cathedra']}"." \n"
														."тел.: {$item['Phone']}"." \n"
														."эл. почта: {$item['Email']}"));
		$table->addCell(2000)->addText(htmlspecialchars("{$item['Website']}"));
		if ($item['CodePreviosEvent'] != NULL)
		{
			$sql3 = "SELECT  `EventName`, `EventType`, 
		 `Status`, `Level` FROM (`events` INNER JOIN `eventtypes`
		 ON `CodeEventType` = `IDEventType` INNER JOIN `status`
		 ON `CodeStatus` = `IDStatus` INNER JOIN `levels`
		 ON `CodeLevel` = `IDLevel`)  WHERE `IDEvent`=".$item['CodePreviosEvent'];
		$res3 = mysqli_query($connect, $sql3);
		$item3 = mysqli_fetch_array( $res3 );
		
		
			$table->addCell(2000)->addText(htmlspecialchars("{$item3['Level']}"." \n "
														."{$item3['Status']}"." \n "
														."{$item3['EventType']}"." \n "
														."\"{$item3['EventName']}\""));
		
		
		}
		else
		{
			$table->addCell(2000)->addText(htmlspecialchars(""));
		}
		
  } 








// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI)
{
    include_once 'Sample_Footer.php';
}

  
  die();
}

  
?>