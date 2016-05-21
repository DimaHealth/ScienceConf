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
 echo '<h2>Генерация приказов на проведение мероприятий</h2>'; 
include("templates/addGenOrderForPlan.php");
 
}


// Функция добавляет новую запись в таблицу БД  
function add_item() 
{ 
require_once("dbconnect.php");
include_once 'Header.php';




// New Word Document
echo date('H:i:s') , ' Create new PhpWord object' , EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addFontStyle('rStyle', array('bold' => true, 'italic' => true, 'size' => 16, 'allCaps' => true, 'doubleStrikethrough' => true));
$phpWord->addParagraphStyle('pStyle', array('align' => 'center', 'spaceAfter' => 100));
$phpWord->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));


$CodePlan = mysqli_escape_string($connect, $_POST['CodePlan'] ); 

$sql = "SELECT `IDEvent`, `EventName`, `StartDate`,
 `Cathedra`, `EventType`, `FIO`, `Post`,
 `Status`, `Level` FROM (`events` INNER JOIN `cathedrae`
 ON `CodeCathedra` = `IdCathedra` INNER JOIN `eventtypes`
 ON `CodeEventType` = `IdEventType` INNER JOIN `status`
 ON `CodeStatus` = `IdStatus` INNER JOIN `levels`
 ON `CodeLevel` = `IdLevel` INNER JOIN `employees`
 ON `CodeExecutiveSecretary` = `IdEmployee` INNER JOIN `posts`
 ON `CodePost` = `IdPost`) WHERE `CodePlan`=".$CodePlan;
$res = mysqli_query($connect, $sql);

	// New portrait section
	$section = $phpWord->addSection();
	
 while ( $item = mysqli_fetch_array( $res ) ) 
  { 

	
	// Simple text
    $section->addText(htmlspecialchars('Донецкий национальный технический университет '.$item['StartDate'].' проводит '.$item['Level'].' '
	.$item['Status'].' '.$item['EventType'].' "'
	.$item['EventName'].'".'));
	$section->addTextBreak(1);
	
	$section->addText(htmlspecialchars('На основании вышеизложенного'));
	$section->addTextBreak(1);
	
	$section->addText(htmlspecialchars('ПРИКАЗЫВАЮ:'), null, 'pStyle');
	$section->addTextBreak(1);
	
	$section->addText(htmlspecialchars('1. Создать оргкомитет по организации и проведению '.$item['EventType'].' в составе.'));
	$section->addTextBreak(1);
	
	$section->addText(htmlspecialchars('1.1 Председатель оргкомитета:'));
	$section->addTextBreak(1);
	
	//'SELECT FIO, Post, '
	$section->addText(htmlspecialchars('- '));
	
	// Two text break

	$section->addPageBreak();
  }




// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}
die();
}

  
?>