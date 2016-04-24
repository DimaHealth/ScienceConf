<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>
<form name="editform" action="?action=update&IDEvent=<?= htmlspecialchars($id) ?>" method="POST"> 

<table class="table"> 
  <tr> 
  <td>Название</td> 
  <td><input type="text" name="EventName" value="<?= htmlspecialchars($item["EventName"]) ?>" /></td> 
  </tr> 
  <tr> 
  <td>Дата начала</td> 
  <td><input type="date" name="StartDate" value="<?= htmlspecialchars($item["StartDate"]) ?>"/></td> 
  </tr> 
    <tr> 
  <td>Дата окончания</td> 
  <td><input type="date" name="ExpirationDate" value="<?= htmlspecialchars($item["ExpirationDate"]) ?>" /></td> 
  </tr> 
    <tr> 
  <td>Ссылка на пресс-релиз</td> 
  <td><input type="text" name="PressReleaseRef" value="<?= htmlspecialchars($item["PressReleaseRef"]) ?>" /></td> 
  </tr> 
    <tr> 
  <td>Ссылка на пост-релиз</td> 
  <td><input type="text" name="PostReleaseRef" value="<?= htmlspecialchars($item["PostReleaseRef"]) ?>" /> </td> 
  </tr> 
    <tr> 
  <td>Количество преподавателей ДонНТУ</td> 
  <td><input type="number_format" name="NumberOfTeachersDonNTU" value="<?= htmlspecialchars($item["NumberOfTeachersDonNTU"]) ?>" /></td> 
  </tr> 
   <tr> 
  <td>Вэб-сайт</td> 
  <td><input type="link" name="Website" value="<?= htmlspecialchars($item["Website"]) ?>" /></td> 
  </tr> 
   <tr> 
  <td>Ссылка на программу</td> 
  <td><input type="link" name="ReferenceToProgram" value="<?= htmlspecialchars($item["ReferenceToProgram"]) ?>" /></td> 
  </tr> 
   <tr> 
  <td>Страны</td> 
  <td><input type="text" name="ExpectedCountries" value="<?= htmlspecialchars($item["ExpectedCountries"]) ?>" /></td> 
  </tr> 
    <tr> 
  <td>Кафедра</td> 
  <td> 
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
  <td>Тип мероприятия</td> 
  <td>
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
  <td><input type="submit" value="Сохранить"></td> 
  <td><button type="button" onClick="history.back();">Отменить</button></td> 
  </tr> 
  </table> 
  </form> 
  </body>
  </html>