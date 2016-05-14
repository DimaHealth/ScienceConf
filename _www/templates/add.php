<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Добавление записи</title>  
  
</head>
<body>
 
  <form name="addform" action="?action=add&IDEvent=<?= htmlspecialchars($id) ?>" method="POST"> 
<div class="col_66">
  <table class="table" > 
<tr> 
  <td style="color: #fff;">Название</td>
  <td><input type="text" name="EventName" value=""  /></td>
  </tr>
  <tr>
  <td style="color: #fff;">Дата начала</td>
  <td><input type="date" name="StartDate" /></td>
  </tr>
    <tr>
  <td style="color: #fff;">Дата окончания</td>
  <td><input type="date" name="ExpirationDate" value="" /></td>
  </tr>
    <tr>
  <td style="color: #fff;">Ссылка на пресс-релиз</td>
  <td><input type="text" name="PressReleaseRef" value="" /></td>
  </tr>
    <tr>
  <td style="color: #fff;">Осылка на пост-релиз</td>
  <td><input type="text" name="PostReleaseRef" value="" /> </td>
  </tr>
    <tr>
  <td style="color: #fff;">Количество преподавателей ДонНТУ</td>
  <td><input type="number_format" name="NumberOfTeachersDonNTU" value="" /></td>
  </tr>
   <tr>
  <td style="color: #fff;">Вэб-сайт</td>
  <td><input type="link" name="Website" value="" /></td>
  </tr>
   <tr>
  <td style="color: #fff;">Ссылка на программу</td>
  <td><input type="link" name="ReferenceToProgram" value="" /></td>
  </tr>
   <tr>
  <td style="color: #fff;">Страны</td>
  <td><input type="text" name="ExpectedCountries" value="" /></td>
  </tr>
    <tr>
  <td style="color: #fff;">Кафедра</td>
  <td style="color: #000;">
  <?php
require_once("dbconnect.php");

$sql = "SELECT * FROM cathedrae";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = CodeCathedra>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?>
</td>
  </tr>
    <tr>
  <td style="color: #fff;">Тип мероприятия</td>
  <td style="color: #000;">
  <?php
require_once("dbconnect.php");

$sql = "SELECT * FROM eventtypes";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = CodeEventType>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?>
</td>
  </tr>
  <tr>
  <td><input type="submit" value="Добавить"></td>
  <td><button type="button" onClick="history.back();">Отменить</button></td>
   </tr>
  </table>
  </form>
  </body>
  </html>
