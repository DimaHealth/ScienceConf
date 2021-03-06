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
	
 $sql = "SELECT `EventName`, `StartDate`, `ExpirationDate`, `EventType`, `Status`, `Level`, `Partner`, cities.City, countries.Country FROM (`events` INNER JOIN `eventtypes` ON `CodeEventType` = `IDEventType` INNER JOIN `status` ON `CodeStatus` = `IDStatus` INNER JOIN `levels` ON `CodeLevel` = `IDLevel` INNER JOIN `partners` ON `IDEvent` = `CodeEvent` INNER JOIN cities ON partners.CodeCity = cities.IDCity INNER JOIN countries ON cities.CodeCountry = countries.IDCountry)  WHERE `IDEvent`= ".$IDEvent." GROUP BY `Partner` ";
 
$res = mysqli_query($connect, $sql);
$flag = 0;
if (mysqli_num_rows($res) == 0)
{
	$flag = 1;
	$sql = "SELECT `EventName`, `StartDate`, `ExpirationDate`, `EventType`, `Status`, `Level`, `ReferenceToCollection` FROM (`events` INNER JOIN `eventtypes` ON `CodeEventType` = `IDEventType` INNER JOIN `status` ON `CodeStatus` = `IDStatus` INNER JOIN `levels` ON `CodeLevel` = `IDLevel`  INNER JOIN collections ON CodeCollection = IDCollection)  WHERE `IDEvent`= ".$IDEvent;
	$res = mysqli_query($connect, $sql);
}
 //die(var_dump($_POST, $_GET, $res));
 $item = mysqli_fetch_array( $res ); 
// //3. colspan (gridSpan) and rowspan (vMerge)

// $section->addPageBreak();
switch ($item['EventType'])
 {
	case 'конференция':
		
		$section->addTextBreak(1);
		$TableName = "Отчёт по конференции";
		$section->addText(htmlspecialchars("{$TableName}"), $header);

		$styleTable = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80);
		$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
		$styleCell = array('valign' => 'center');
		$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
		$fontStyle = array('bold' => true, 'align' => 'center');
		$phpWord->addTableStyle($TableName, $styleTable, $styleFirstRow);
		$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
		$cellRowSpan = array('vMerge' => 'restart', 'align' => 'left');
		$cellRowContinue = array('vMerge' => 'continue');
		$cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
		$cellColSpan4 = array('gridSpan' => 4, 'valign' => 'center');
		$cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
		$cellHCentered = array('align' => 'center');
		$cellVCentered = array('valign' => 'center');
		$cellLeft = array('align' => 'left');
		
		$table = $section->addTable($TableName);
		$RIGHT_COLUMN_WIDTH = 1800;
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Вид, статус и уровень:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("{$item['Level']}"." "."{$item['EventType']}"." "
		."{$item['Status']}"));
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Название:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("\"{$item['EventName']}\""));
		//$table->addCell($RIGHT_COLUMN_WIDTH)->addText(htmlspecialchars("\"{$item['EventName']}\""));
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Место проведения:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars('г.Донецк, Донецкий национальный технический университет'));
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Дата проведения:'));
		$StartDate = strtotime($item['StartDate']);
		$EndDate = strtotime($item['ExpirationDate']);
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars(date('d.m.Y',($StartDate))." - ".date('d.m.Y',($EndDate))));
		
		$partnersStr = "";
		$counter = 1;
		
		$res = mysqli_query($connect, $sql);
		if ($flag!=1)
		{
			while($item = mysqli_fetch_array( $res ))
			{
				$partnersStr .= $counter++.". ".$item['Partner']."(".$item['City'].", ".$item['Country'].")\n";
				
			}
		}
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Соорганизаторы:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText($partnersStr);
		
		$sqlSectionsOfEvent = "SELECT Section, COUNT(IDPublication) as NumOfPublications FROM events INNER JOIN sections ON IDEvent = CodeEvent INNER JOIN publications ON IDSection = CodeSection WHERE IDEvent = ".$IDEvent." GROUP BY Section";
		
		
	$table->addRow();
		$cell1 = $table->addCell(1800, $cellRowSpan);
		$textrun1 = $cell1->addTextRun($cellLeft);
		$textrun1->addText(htmlspecialchars('Секции и количество докладчиков:'));
		
		$sectionsOfEventResult = mysqli_query($connect, $sqlSectionsOfEvent);
		$itemSections = mysqli_fetch_array($sectionsOfEventResult);
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan3);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("1. ".$itemSections['Section']));
		//$table->addCell(1800)->addText();
	    $table->addCell(1800)->addText(htmlspecialchars($itemSections['NumOfPublications']));
		
		$counter = 2;
		$totalSumOfPublicators = $itemSections['NumOfPublications'];
		while($itemSections = mysqli_fetch_array($sectionsOfEventResult))
		{
			$table->addRow();
				$cell1 = $table->addCell(1800, $cellRowContinue);
				$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan3);
				$textrun2 = $cell2->addTextRun($cellLeft);
				$textrun2->addText(htmlspecialchars(htmlspecialchars($counter++.". ".$itemSections['Section'])));
							
				$totalSumOfPublicators += $itemSections['NumOfPublications'];
				
				$table->addCell(1800)->addText(htmlspecialchars($itemSections['NumOfPublications']));
		}
	 $table->addRow();
		 $table->addCell(1800)->addText(htmlspecialchars('Общее количество зарегистрированных участников:'));
		 $cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		 $textrun2 = $cell2->addTextRun($cellLeft);
		 $textrun2->addText(htmlspecialchars($totalSumOfPublicators)." чел.");
		  $sqlStudentsDonntu = "SELECT FIO, `Group`, Theme FROM events INNER JOIN sections ON IDEvent = CodeEvent INNER JOIN publications ON CodeSection = IDSection INNER JOIN publicators ON CodeStudent = IDPublicator INNER JOIN groups ON CodeGroup = IDGroup INNER JOIN cathedrae ON publicators.CodeCathedra = IDCathedra INNER JOIN faculties ON CodeFaculty = IDFaculty INNER JOIN universities ON CodeUniversity = IDUniversity WHERE University = 'ДонНТУ' AND HasReport = 1 AND IDEvent =".$IDEvent;
		 $resStudentsDonntu = mysqli_query($connect, $sqlStudentsDonntu);
		
		 
		 for($i = 1;  $itemStudentsDonntu = mysqli_fetch_array($resStudentsDonntu); $i++) 
		 {
		 $table->addRow();
			 if ($i == 1)
			 {
				 $cell1 = $table->addCell(1800, $cellRowSpan);
					$textrun1 = $cell1->addTextRun($cellLeft);
					$textrun1->addText(htmlspecialchars('В т.ч. участие студентов ДонНТУ с докладами и публикациями:'));
			 }
			 else
			 {
				 $cell1 = $table->addCell(1800, $cellRowContinue);
				 
			 }
			$cell2=$table->addCell(1800)->addText(htmlspecialchars($itemStudentsDonntu['FIO']));
			$cell3=$table->addCell(1800)->addText(htmlspecialchars("гр. ".$itemStudentsDonntu['Group']));
			$cell4 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan2);
			$textrun4 = $cell4->addTextRun($cellLeft);
			$textrun4->addText(htmlspecialchars($itemStudentsDonntu['Theme']));
			
		 }
		 
		 $sqlStudentsNotDonntu = "SELECT FIO, typeOfStudy, University, City, Country, publicators.Phone, publicators.Email FROM events INNER JOIN sections ON IDEvent = CodeEvent INNER JOIN publications ON CodeSection = IDSection INNER JOIN publicators ON CodeStudent = IDPublicator INNER JOIN cathedrae ON publicators.CodeCathedra = IDCathedra INNER JOIN faculties ON CodeFaculty = IDFaculty INNER JOIN universities ON CodeUniversity = IDUniversity INNER JOIN cities ON CodeCity = IDCity INNER JOIN countries ON CodeCountry = IDCountry WHERE University <> 'ДонНТУ' AND IDEvent =".$IDEvent;
		 
		 $resStudentsNotDonntu = mysqli_query($connect, $sqlStudentsNotDonntu);
		 if ( $itemStudentsNotDonntu = mysqli_fetch_array($resStudentsNotDonntu)) 
		 {
			$table->addRow();
			 $cell1 = $table->addCell(1800, $cellRowSpan);
						$textrun1 = $cell1->addTextRun($cellLeft);
						$textrun1->addText(htmlspecialchars('В т.ч. участие представителей сторонних вузов, предприятий и организаций:'));
			$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['FIO']));
			$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['typeOfStudy'] == 1 ? 'заочное участие' : 'очное участие'));
			$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['University']." (".$itemStudentsNotDonntu['City'].", ".$itemStudentsNotDonntu['Country'].")"));
			$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['Phone'].", ".$itemStudentsNotDonntu['Email']));
			
			  while($itemStudentsNotDonntu = mysqli_fetch_array($resStudentsNotDonntu)) 
				 {
				  $table->addRow();
					 
						$cell1 = $table->addCell(1800, $cellRowContinue);
						 $table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['FIO']));
						$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['typeOfStudy'] == 1 ? 'заочное участие' : 'очное участие'));
						$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['University']." (".$itemStudentsNotDonntu['City'].", ".$itemStudentsNotDonntu['Country'].")"));
						$table->addCell(1800)->addText(htmlspecialchars($itemStudentsNotDonntu['Phone'].", ".$itemStudentsNotDonntu['Email']));
					
				 }
		 }
		 else
		 {
			  $table->addRow();
			  	$cell1 = $table->addCell(1800, $cellRowSpan);
						$textrun1 = $cell1->addTextRun($cellLeft);
						$textrun1->addText(htmlspecialchars('В т.ч. участие представителей сторонних вузов, предприятий и организаций:'));
						//$cell1 = $table->addCell(1800, $cellRowContinue);
						$table->addCell(1800)->addText(htmlspecialchars(''));
						$table->addCell(1800)->addText(htmlspecialchars(''));
						$table->addCell(1800)->addText(htmlspecialchars(''));
						$table->addCell(1800)->addText(htmlspecialchars(''));
						
		 }
		
		
		$sql = "SELECT `ReferenceToCollection` FROM (`events` INNER JOIN collections ON CodeCollection = IDCollection)  WHERE `IDEvent`= ".$IDEvent;
		$res = mysqli_query($connect, $sql);
		$item = mysqli_fetch_array( $res );
		 
		 $table->addRow();
			$table->addCell(1800)->addText(htmlspecialchars('Издание материалов:'));

			$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
			$textrun2 = $cell2->addTextRun($cellLeft);
			$reference = $item['ReferenceToCollection'];
			if($reference != NULL) 
			{
				$textrun2->addText(htmlspecialchars($reference));
			} 
			else
			{
				$textrun2->addText(htmlspecialchars("планируется в срок до <ДАТА ВЫХОДА СБОРНИКА>"));
			}
			
		$table->addRow();
			$table->addCell(1800)->addText(htmlspecialchars('Рекомендации мероприятия:'));
			$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
			$textrun2 = $cell2->addTextRun($cellLeft);
			$textrun2->addText(htmlspecialchars(''));

		
		break;
		
//////////////////////////////////////////////////////////////
//==========================================================//
//////////////////////////////////////////////////////////////

		case 'олимпиада':
		
		$section->addTextBreak(1);
		$TableName = "Отчёт по олимпиаде";
		$section->addText(htmlspecialchars("{$TableName}"), $header);

		$styleTable = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80);
		$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
		$styleCell = array('valign' => 'center');
		$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
		$fontStyle = array('bold' => true, 'align' => 'center');
		$phpWord->addTableStyle($TableName, $styleTable, $styleFirstRow);
		$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
		$cellRowSpan = array('vMerge' => 'restart', 'align' => 'left');
		$cellRowContinue = array('vMerge' => 'continue');
		$cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');
		$cellColSpan4 = array('gridSpan' => 4, 'valign' => 'center');
		$cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
		$cellHCentered = array('align' => 'center');
		$cellVCentered = array('valign' => 'center');
		$cellLeft = array('align' => 'left');
		
		$table = $section->addTable($TableName);
		$RIGHT_COLUMN_WIDTH = 1800;
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Вид, статус и уровень:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("{$item['Level']}"." "."{$item['EventType']}"." "
		."{$item['Status']}"));
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Название:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("\"{$item['EventName']}\""));
		//$table->addCell($RIGHT_COLUMN_WIDTH)->addText(htmlspecialchars("\"{$item['EventName']}\""));
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Место проведения:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars('г.Донецк, Донецкий национальный технический университет'));
		
	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Дата проведения:'));
		$StartDate = strtotime($item['StartDate']);
		$EndDate = strtotime($item['ExpirationDate']);
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars(date('d.m.Y',($StartDate))." - ".date('d.m.Y',($EndDate))));
		
		$partnersStr = "";
		$counter = 1;
		
		$res = mysqli_query($connect, $sql);
		if ($flag!=1)
		{
			while($item = mysqli_fetch_array( $res ))
			{
				$partnersStr .= $counter++.". ".$item['Partner']."(".$item['City'].", ".$item['Country'].")\n";
				
			}
		}


	$table->addRow();
		$table->addCell(1800)->addText(htmlspecialchars('Соорганизаторы:'));
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText($partnersStr);
		
		$sqlSectionsOfEvent = "SELECT Section, COUNT(IDPublication) as NumOfPublications FROM events INNER JOIN sections ON IDEvent = CodeEvent INNER JOIN publications ON IDSection = CodeSection WHERE IDEvent = ".$IDEvent." GROUP BY Section";
		
		
	$table->addRow();
		$cell1 = $table->addCell(1800, $cellRowSpan);
		$textrun1 = $cell1->addTextRun($cellLeft);
		$textrun1->addText(htmlspecialchars('Секции и количество принимавших участие:'));
		
		$sectionsOfEventResult = mysqli_query($connect, $sqlSectionsOfEvent);
		$itemSections = mysqli_fetch_array($sectionsOfEventResult);
		$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan2);
		$textrun2 = $cell2->addTextRun($cellLeft);
		$textrun2->addText(htmlspecialchars("1. ".$itemSections['Section']));
		//$table->addCell(1800)->addText();
	    $table->addCell(1800)->addText(htmlspecialchars($itemSections['NumOfPublications']));
		
		$counter = 2;
		$totalSumOfPublicators = $itemSections['NumOfPublications'];
		while($itemSections = mysqli_fetch_array($sectionsOfEventResult))
		{
			$table->addRow();
				$cell1 = $table->addCell(1800, $cellRowContinue);
				$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan2);
				$textrun2 = $cell2->addTextRun($cellLeft);
				$textrun2->addText(htmlspecialchars(htmlspecialchars($counter++.". ".$itemSections['Section'])));
							
				$totalSumOfPublicators += $itemSections['NumOfPublications'];
				
				$table->addCell(1800)->addText(htmlspecialchars($itemSections['NumOfPublications']));
		}

		  $sqlStudentsDonntu = "SELECT FIO, `Group`, University, ScoredPoints, City, Country FROM events INNER JOIN sections ON IDEvent = CodeEvent INNER JOIN publications ON CodeSection = IDSection INNER JOIN publicators ON CodeStudent = IDPublicator INNER JOIN groups ON CodeGroup = IDGroup INNER JOIN cathedrae ON publicators.CodeCathedra = IDCathedra INNER JOIN faculties ON CodeFaculty = IDFaculty INNER JOIN universities ON CodeUniversity = IDUniversity INNER JOIN cities ON CodeCity = IDCity INNER JOIN  countries ON CodeCountry = IDCountry WHERE IDEvent =".$IDEvent;
		 $resStudentsDonntu = mysqli_query($connect, $sqlStudentsDonntu);
		
		 
		 for($i = 1;  $itemStudentsDonntu = mysqli_fetch_array($resStudentsDonntu); $i++) 
		 {
		 $table->addRow();
			 if ($i == 1)
			 {
				 $cell1 = $table->addCell(1800, $cellRowSpan);
					$textrun1 = $cell1->addTextRun($cellLeft);
					$textrun1->addText(htmlspecialchars('Результаты:'));
			 }
			 else
			 {
				 $cell1 = $table->addCell(1800, $cellRowContinue);
				 
			 }
			 
			$cell2=$table->addCell(1800)->addText(htmlspecialchars($itemStudentsDonntu['FIO']));
			if($itemStudentsDonntu['University'] == "ДонНТУ")
			{
				$cell3=$table->addCell(1800)->addText(htmlspecialchars($itemStudentsDonntu['University'].", гр. ".$itemStudentsDonntu['Group']));
			} 
			else 
			{
				$cell3 = $table->addCell(1800)->addText(htmlspecialchars($itemStudentsDonntu['University']." (".$itemStudentsDonntu['City'].", ".$itemStudentsDonntu['Country'].")"));
			}
			

			$cell4 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan2);
			$textrun4 = $cell4->addTextRun($cellLeft);
			$textrun4->addText(htmlspecialchars($itemStudentsDonntu['ScoredPoints']));
			
		 }
		 
		
			
		$table->addRow();
			$table->addCell(1800)->addText(htmlspecialchars('Рекомендации мероприятия:'));
			$cell2 = $table->addCell($RIGHT_COLUMN_WIDTH, $cellColSpan4);
			$textrun2 = $cell2->addTextRun($cellLeft);
			$textrun2->addText(htmlspecialchars(''));
		
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