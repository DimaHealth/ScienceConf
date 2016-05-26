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
  <title>Отчеты</title>  
  
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
						<li ><a href="genPlans.php">Планы</a></li>
						<li><a href="genOrders.php">Приказы</a></li>
						<li class="active"><a href="genReports.php">Отчеты</a></li>
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
 echo '<h2>Генерация отчетов</h2>'; 
include("templates/addGenReport.php");
 
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



$IDEvent = mysqli_escape_string($connect, $_POST['IDEvent'] ); 
	
 $sql = "SELECT `EventName`, `StartDate`, `ExpirationDate`, `EventType`, `Status`, `Level`, `Partner` FROM (`events` INNER JOIN `eventtypes` ON `CodeEventType` = `IDEventType` INNER JOIN `status` ON `CodeStatus` = `IDStatus` INNER JOIN `levels` ON `CodeLevel` = `IDLevel` INNER JOIN `partners` ON `IDEvent` = `CodeEvent`)  WHERE `IDEvent`= ".$IDEvent." GROUP BY `Partner` ";
 
$res = mysqli_query($connect, $sql);
 $item = mysqli_fetch_array( $res ); 
// //3. colspan (gridSpan) and rowspan (vMerge)

// $section->addPageBreak();
switch ($item['EventType'])
 {
	case 'конференция':
	
		// $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
		// $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
		// $cellRowContinue = array('vMerge' => 'continue');
		// $cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
		// $cellHCentered = array('align' => 'center');
		// $cellVCentered = array('valign' => 'center');

		
		// $table->addRow();

		// $cell1 = $table->addCell(2000, $cellRowSpan);
		// $textrun1 = $cell1->addTextRun($cellHCentered);
		// $textrun1->addText(htmlspecialchars('A'));
		// $textrun1->addFootnote()->addText(htmlspecialchars('Row span'));

		
	
		// $table->addCell(2000, $cellRowSpan)->addText(htmlspecialchars('E'), null, $cellHCentered);

		// $table->addRow();
		// $table->addCell(null, $cellRowContinue);
		// $table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('C'), null, $cellHCentered);
		// $table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('D'), null, $cellHCentered);
		// $table->addCell(null, $cellRowContinue);
	
	
	
		$section->addTextBreak(1);
		$TableName = "Отчёт по конференции";
		$section->addText(htmlspecialchars("{$TableName}"), $header);

		$styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
		$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
		$styleCell = array('valign' => 'center');
		$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
		$fontStyle = array('bold' => true, 'align' => 'center');
		$phpWord->addTableStyle($TableName, $styleTable, $styleFirstRow);
		$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
		$cellRowSpan = array('vMerge' => 'restart', 'align' => 'left');
		$cellRowContinue = array('vMerge' => 'continue');
		$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
		$cellHCentered = array('align' => 'center');
		$cellVCentered = array('valign' => 'center');
		$cellLeft = array('align' => 'left');
		
		$table = $section->addTable($TableName);
		$RIGHT_COLUMN_WIDTH = 7500;
	$table->addRow();
		$table->addCell(2000)->addText(htmlspecialchars('Вид, статус и уровень:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("{$item['Level']}"." "."{$item['Status']}"." "
		."{$item['EventType']}"));
		
		
	$table->addRow();
		$table->addCell(2000)->addText(htmlspecialchars('Название:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("\"{$item['EventName']}\""));
		//$table->addCell($RIGHT_COLUMN_WIDTH)->addText(htmlspecialchars("\"{$item['EventName']}\""));
		
	$table->addRow();
		$table->addCell(2000)->addText(htmlspecialchars('Место проведения:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars('г.Донецк, Донецкий национальный технический университет'));
		
		
	$table->addRow();
		$table->addCell(2000)->addText(htmlspecialchars('Даты проведения:'));
		
		$StartDate = strtotime($item['StartDate']);
		$EndDate = strtotime($item['ExpirationDate']);
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars(date('d.m.Y',($StartDate))." - ".date('d.m.Y',($EndDate))));
		
		$partnersStr = "";
		$counter = 1;
		
		$res = mysqli_query($connect, $sql);
		while($item = mysqli_fetch_array( $res )) {
			$partnersStr .= $counter++.". ".$item['Partner']."\n";
			
		}

	$table->addRow();
		$table->addCell(2000)->addText(htmlspecialchars('Соорганизаторы:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText($partnersStr);
		

		$sqlSectionsOfEvent = "SELECT Section, COUNT(IDPublication) as NumOfPublications FROM events INNER JOIN sections ON IDEvent = CodeEvent INNER JOIN publications ON IDSection = CodeSection WHERE IDEvent = ".$IDEvent." GROUP BY Section";
	$table->addRow();
	
	$cell1 = $table->addCell(2000, $cellRowSpan);
		$textrun1 = $cell1->addTextRun($cellHCentered);
		$textrun1->addText(htmlspecialchars('Секции и количество докладчиков:'));
		//$textrun1->addFootnote()->addText(htmlspecialchars('Row span'));
		
		$table->addCell(3750)->addText('');
	    $table->addCell(3750)->addText('');
	$table->addRow();
		$cell1 = $table->addCell(2000, $cellRowContinue);
		$table->addCell(3750)->addText('');
	    $table->addCell(3750)->addText('');
	$table->addRow();
		$cell1 = $table->addCell(2000, $cellRowContinue);
		$table->addCell(3750)->addText('');
	    $table->addCell(3750)->addText('');
		break;
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