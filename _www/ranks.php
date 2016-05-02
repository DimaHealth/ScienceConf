
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Ученые звания</title>  
  
</head>
<body>

<form action="" method="post" name="r_form2" >


 <header class="header clearfix">
      <div class="logo">.Simpliste</div>

      <nav class="menu_main">
        <ul>
          <li><a href="mainform.php">Main</a></li>
          <li><a href="addnewuser.php">Пользователи</a></li>
          <li ><a href="tableofevents.php">Мероприятия</a></li>
          <li class="active"><a href="addnewdictionary.php">Справочники</a></li>
          <li><a href="addnewreport.html">Отчеты</a></li>
          <li><a href="addnewtables.php">Другие таблицы</a></li>
		  <li><a href="exit.php">Выйти</a></li>
        </ul>
      </nav>
    </header>

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

 
$sql = "SELECT * FROM ranks";
require_once("dbconnect.php");
$res = mysqli_query($connect, $sql);

  echo '<h2>Ученые звания</h2>'; 
  echo '<div class="col_66">';
    echo '<table border="1" class="table">';      
   
  echo '<tr><th>ID</th><th>Ученое звание</th>
   <th>Ред.</th><th>Удл.</th></tr>'; 
  while ( $item = mysqli_fetch_array( $res ) ) 
  { 
    echo '<tr>'; 
	echo '<td>'.$item['IDRank'].'</td>'; 
    echo '<td>'.$item['Rank'].'</td>'; 
    echo '<td><a href="?action=editform&id='.$item['IDRank'].'">Ред.</a></td>'; 
    echo '<td><a href="?action=delete&id='.$item['IDRank'].'">Удл.</a></td>'; 
    echo '</tr>'; 
  } 
  echo '</table>';
  echo '<p><a href="'.$_SERVER['PHP_SELF'].'?action=addform">Добавить</a></p>';  
} 


// Функция формирует форму для добавления записи в таблице БД 
function get_add_item_form() 
{ 
include("templates/addRank.php");
 
}


// Функция добавляет новую запись в таблицу БД  
function add_item() 
{ 
require_once("dbconnect.php");
  $Rank = mysqli_escape_string($connect, $_POST['Rank'] ); 
   $query = " INSERT INTO `ranks`(`Rank`) 
 VALUES ('$Rank')"; 
  mysqli_query ($connect, $query ); 
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
}

// Функция формирует форму для редактирования записи в таблице БД 
function get_edit_item_form() 
{ 
  require_once("dbconnect.php");
  echo '<h2>Редактировать</h2>'; 
  $id = empty($_GET["id"]) ? 0 : intval($_GET["id"]);
  $query = 'select * from ranks WHERE IDRank='.$id; 
  
  $res = mysqli_query($connect ,$query ); 
  $item = mysqli_fetch_array( $res ); 
  include("templates/updateRank.php");
} 

// Функция обновляет запись в таблице БД  


function update_item() 
{ 
require_once("dbconnect.php");
$id = mysqli_escape_string($connect, $_GET['IDRank'] );
  $Rank = mysqli_escape_string($connect, $_POST['Rank'] ); 
  $query = "UPDATE ranks SET Rank='".$Rank."' WHERE IDRank=".$id;
   
  mysqli_query ($connect, $query ); 
   // die(var_dump($_POST, $_GET, $id));
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 

// Функция удаляет запись в таблице БД 
function delete_item() 
{ 
  require_once("dbconnect.php");
  $id = empty($_GET["id"]) ? 0 : intval($_GET["id"]);
  $query = "DELETE FROM ranks WHERE IDRank=".$id; 
  mysqli_query ($connect, $query ); 
 // die(var_dump($_POST, $_GET, $id));
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
} 
  
?>