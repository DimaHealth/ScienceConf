<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>

<form name="editform" action="?action=update&IDPartner=<?= htmlspecialchars($id) ?>" method="POST"> 

<table class="table"> 
  <tr> 
  <td>Партнер</td> 
  <td><input type="text" name="Partner" value="<?= htmlspecialchars($item["Partner"]) ?>" /></td> 
  </tr> 
  <tr> 
  <td>Телефон</td> 
  <td><input type="phone" name="Phone" value="<?= htmlspecialchars($item["Phone"]) ?>"/></td> 
  </tr> 
    <tr> 
  <td>Website</td> 
  <td><input type="text" name="Website" value="<?= htmlspecialchars($item["Website"]) ?>" /></td> 
  </tr> 
    <tr> 
  <td>Email</td> 
  <td><input type="text" name="E-mail" value="<?= htmlspecialchars($item["E-mail"]) ?>" /></td> 
  </tr> 
    <tr> 
  <td>Мероприятие</td> 
  <td> 
  <?php
require_once("dbconnect.php");

$sql = "SELECT * FROM events";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = CodeEvent>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?>
</td> 
  </tr> 
  <tr> 
  <td>Кол-во участников</td> 
  <td><input type="number" name="NumberOfParticipants" value="<?= htmlspecialchars($item["NumberOfParticipants"]) ?>" /></td> 
  </tr> 
  
  <tr> 
  <td><input type="submit" value="Сохранить"></td> 
  <td><button type="button" onClick="history.back();">Отменить</button></td> 
  </tr> 
  </table> 
  </form> 
  </body>
  </html>