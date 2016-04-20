 <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<form action="addneweventscr.php" method="post" name="r_form2" >

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Новое мероприятие</title>  
  
</head>
   <header class="header clearfix">
      <div class="logo">.Simpliste</div>

      <nav class="menu_main">
        <ul>
          <li ><a href="mainform.html">Main</a></li>
          <li><a href="addnewuser.html">Пользователи</a></li>
          <li class="active"><a href="tableofevents.php">Мероприятия</a></li>
		  <li><a href="addnewdictionary.html">Справочники</a></li>
		  <li><a href="addnewreport.html">Отчеты</a></li>
		  <li><a href="addnewtables.html">Другие таблицы</a></li>
        </ul>
      </nav>
    </header>
		  
<div class="col_66">
         
          <table class="table">
<tr>
<td> Название мероприятия*: </td>
<td> <input type="text" name="r_name" required=" " /> </td>
</tr>
<tr>
<td> Дата начала*: </td>
<td> <input type="date" name="r_startdate" required=" " /> </td>
</tr>
<tr>
<td> Дата окончания*: </td>
<td> <input type="date" name="r_expirationdate" required=" " /> </td>
</tr>
<tr> 
<td> Кафедра*: </td>
<td>
<?php
require_once("dbconnect.php");

$sql = "SELECT * FROM cathedrae";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = r_cathedrae>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?>
</td>
</tr>
<tr>
<td> Тип мероприятия*: </td>
<td>
<?php
require_once("dbconnect.php");

$sql = "SELECT * FROM eventtypes";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = r_eventtype>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?>
</td>
</tr>

<tr>
<td> Ссылка на пресс - релиз: </td>
<td> <input type="link" name="r_pressrelease" required=" " /> </td>
</tr>

<tr>
<td> Ссылка на пост - релиз: </td>
<td> <input type="link" name="r_postrelease" required=" " /> </td>
</tr>

<tr>
<td> Ответственный секретарь: </td>
<td> 
<SELECT>
<OPTION>Пункт 1</OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td> План: </td>
<td> 
<SELECT>
<OPTION>Пункт 1</OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td> Приказ: </td>
<td> 
<SELECT>
<OPTION>Пункт 1</OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td> Количество преподавателей ДонНТУ: </td>
<td> <input type="number" name="r_numofteachers" /> </td>
</tr>

<tr>
<td> Статус: </td>
<td> 
<SELECT>
<OPTION>Пункт 1</OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td> Уровень: </td>
<td> 
<SELECT>
<OPTION>Пункт 1</OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td> Сайт: </td>
<td> <input type="text" name="r_website" /> </td>
</tr>

<tr>
<td> Ссылка на программу или положение: </td>
<td> <input type="text" name="r_referenceToProgram" /> </td>
</tr>

<tr>
<td> Предшествующее мероприятие: </td>
<td> 
<SELECT>
<OPTION>Пункт 1</OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td> Сборник: </td>
<td> 
<SELECT name="r_collection">
<OPTION value="23">Пункт </OPTION>
<OPTION>Пункт 2</OPTION>
</SELECT>
</td>
</tr>


<tr>
<td> Предполагаемые страны: </td>
<td> <input type="text" name="r_expectedCountries" /> </td>
</tr>

<tr>
<td colspan="2"> <input type="submit" name="r_addevent" value="Добавить" /> </td>
</tr>
</table>
</form>