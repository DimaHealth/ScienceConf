<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<form action="addnewevent.php" method="post" name="r_form2" >
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Мероприятия</title>  
  
</head>
 <header class="header clearfix">
      <div class="logo">.Simpliste</div>

      <nav class="menu_main">
        <ul>
          <li><a href="mainform.html">Main</a></li>
          <li><a href="addnewuser.html">Пользователи</a></li>
          <li class="active"><a href="tableofevents.php">Мероприятия</a></li>
		  <li><a href="addnewdictionary.html">Справочники</a></li>
		  <li><a href="addnewreport.html">Отчеты</a></li>
		  <li><a href="addnewtables.html">Другие таблицы</a></li>
        </ul>
      </nav>
    </header>
<tr>
<td colspan="2"> <input type="button" value="Добавить" onClick='location.href="http://localhost/_www/addnewevent.php"'>
</tr>
<tr>
<td colspan="2"> <input type="button" value="На главную" onClick='location.href="http://localhost/_www/mainform.html"'>
</tr>
</table>

</form>
<?php
require_once("dbconnect.php");

$qr_result = mysqli_query( $connect, "select * from events")
    or die(mysqli_error($connect));

    // выводим на страницу сайта заголовки HTML-таблицы
	echo '<div class="col_66">';
	echo '<h2>Мероприятия</h2>';
    echo '<table border="1" class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Название мероприятия</th>';
  echo '<th>Дата начала</th>';
  echo '<th>Дата окончания</th>';
  echo '<th>Кафедра</th>';
  echo '<th>Тип мероприятия</th>';
  echo '<th>Ссылка на пресс-релиз</th>';
  echo '<th>Ссылка на пост-релиз</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
  while($data = mysqli_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['EventName'] . '</td>';
    echo '<td>' . $data['StartDate'] . '</td>';
    echo '<td>' . $data['ExpirationDate'] . '</td>';
	echo '<td>' . $data['CodeCathedra'] . '</td>';
    echo '<td>' . $data['CodeEventType'] . '</td>';
    echo '<td>' . $data['PressReleaseRef'] . '</td>';
	echo '<td>' . $data['PostReleaseRef'] . '</td>';
    echo '</tr>';
  }

 
exit();


?>

