<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>
<form name="editform" action="?action=update&IDPublication=<?= htmlspecialchars($id) ?>" method="POST"> 

<table class="table">
	<tr> 
			<td>Студент</td>
			<td>
				<?php
					require_once("dbconnect.php");
					$sql = "SELECT * FROM publicators";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeStudent>";
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr['FIO']</option>";
					}
					echo "</select>";
				?>
			</td>
		</tr>
		
		<tr> 
			<td>Секция</td>
			<td>
				<?php
					require_once("dbconnect.php");
					$sql = "SELECT * FROM sections";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeSection>";
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr[1]</option>";
					}
					echo "</select>";
				?>
			</td>
		</tr>
		
		<tr>
			<td>Есть ли доклад</td>
			<td><input type="boolean" name="HasReport" required=" " value="<?= htmlspecialchars($item["HasReport"]) ?>" /></td>
		</tr>
		
		<tr> 
			<td>Руководитель</td>
			<td>
				<?php
					require_once("dbconnect.php");
					$sql = "SELECT * FROM employees";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeHead>";
					while($arr = mysqli_fetch_array($result_select)) {
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