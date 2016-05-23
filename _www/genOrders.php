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
  <title>Приказы</title>  
  
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
						<li class="active"><a href="genOrders.php">Приказы</a></li>
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
require("dbconnect.php");
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
    $section->addText(htmlspecialchars('Донецкий национальный технический университет '.date('d.m.Y',(strtotime($item['StartDate']))).' проводит '.$item['Level'].' '
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
	$post = "председатель оргкомитета";
	$sql2 = "SELECT FIO, Post, Cathedra FROM employees INNER JOIN posts ON employees.CodePost = IDPost INNER JOIN cathedrae ON CodeCathedra = IDCathedra INNER JOIN involvedemployees ON CodeEmployee = IDEmployee  WHERE  involvedemployees.CodePost = (SELECT IDPost FROM posts WHERE Post = \"".$post."\") AND (CodeEvent = ".$item['IDEvent'].")";
	$res2 = mysqli_query($connect, $sql2);
	while ($item2 = mysqli_fetch_array( $res2 )) 
	{
		$section->addText(htmlspecialchars('- '.$item2['FIO'].", ".$item2['Post']." \"".$item2['Cathedra']."\";"));
		$section->addTextBreak(1);
		$section->addText(htmlspecialchars('1.2 Члены оргкомитета:'));
		$section->addTextBreak(1);
	}
	$post = "член оргкомитета";
	$sql3 = "SELECT FIO, Post, Cathedra FROM employees INNER JOIN posts ON employees.CodePost = IDPost INNER JOIN cathedrae ON CodeCathedra = IDCathedra INNER JOIN involvedemployees ON CodeEmployee = IDEmployee  WHERE  involvedemployees.CodePost = (SELECT IDPost FROM posts WHERE Post = \"".$post."\") AND (CodeEvent = ".$item['IDEvent'].")";
	$res3 = mysqli_query($connect, $sql3);
	while ($item3 = mysqli_fetch_array( $res3 ))
	{
		$section->addText(htmlspecialchars('- '.$item3['FIO'].", ".$item3['Post']." \"".$item3['Cathedra']."\";"));
		$section->addTextBreak(1);
		// Two text break
	}
	
	$section->addText(htmlspecialchars('1.3 Ответственный секретарь оргкомитета:'));
	$section->addTextBreak(1);
	$section->addText(htmlspecialchars('- '.$item['FIO'].", ".$item['Post']." \"".$item['Cathedra']."\";"));
	$section->addTextBreak(1);
	$section->addText(htmlspecialchars('2. Подготовить и разослать участникам программу работы '.$item['EventType']."."));
	$section->addTextBreak(1);
	$section->addText(htmlspecialchars('3. Ответственному секретарю оргкомитета в 10-ти дневный срок после проведения конференции подготовить и сдать отчет в НИЧ о проведении '.$item['EventType']."."));
	$section->addTextBreak(1);
	$date = strtotime($item['StartDate']);
	$section->addText(htmlspecialchars('4. Ответственному секретарю оргкомитета подготовить сборник докладов '.$item['Level'].' '
	.$item['Status'].' '.$item['EventType'].' "'
	.$item['EventName']." в электронном виде и выставить в электронном архиве и каталоге НТБ университета в срок до ".date('d.m.Y',($date+86400*10))));
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