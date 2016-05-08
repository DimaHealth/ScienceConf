<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>

<form name="editform" action="?action=update&IDFormation=<?= htmlspecialchars($id) ?>" method="POST"> 
<div class="col_66">
<table class="table"> 
      <tr> 
  <td style="color: #fff;">Сотрудник</td> 
  <td style="color: #000;"> 
 <?php
		require_once("dbconnect.php");

		$sql = "SELECT * FROM employees";

		$result_select = mysqli_query($connect, $sql);


		/*Выпадающий список*/

		echo "<select  name = CodeEmployee>";

		while($arr = mysqli_fetch_array($result_select)){

		echo "<option value = '$arr[0]' > $arr[1]</option>";

		}

		echo "</select>";

?>
</td> 
  </tr> 
        <tr> 
  <td style="color: #fff;">Приказ</td> 
  <td style="color: #000;"> 
 <?php
		require_once("dbconnect.php");

		$sql = "SELECT * FROM orders";

		$result_select = mysqli_query($connect, $sql);


		/*Выпадающий список*/

		echo "<select  name = CodeOrder>";

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