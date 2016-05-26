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
<div class="col_66">
<table class="table">
	<tr> 
			<td style="color: #fff;">Студент</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");
					$sql = "SELECT * FROM publicators";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeStudent>";
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr[3]</option>";
					}
					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>
		
		<tr> 
			<td style="color: #fff;">Секция</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");
					$sql = "SELECT `IDSection`, `Section`, `EventName` FROM `sections` INNER JOIN events ON CodeEvent = IDEvent";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeSection>";
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr[1], $arr[2]</option>";
					}
					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>
		
		<tr>
			<td style="color: #fff;">Есть ли доклад</td>
			<td><input type="boolean" name="HasReport" required=" " value="<?= htmlspecialchars($item["HasReport"]) ?>" /></td>
		</tr>
		
		<tr> 
			<td style="color: #fff;">Руководитель</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");
					$sql = "SELECT * FROM employees";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeHead>";
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr[1]</option>";
					}
					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>
		
		<tr>
			<td style="color: #fff;">Тема доклада</td>
			<td><input type="text" name="Theme" value="<?= htmlspecialchars($item["Theme"]) ?>" /></td>
		</tr>
		
		<tr>
			  <td><input type="submit" value="Сохранить"></td> 
			  <td><button type="button" onClick="history.back();">Отменить</button></td> 
		</tr> 
  </table> 
  </form> 
  </body>
  </html>