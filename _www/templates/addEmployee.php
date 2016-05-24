<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="css/style.css">
	<title>Добавление записи</title>  
	
</head>
<body>
	<form name="addform" action="?action=add" method="POST"> 
	<div class="col_66">
	<table class="table" > 
		<tr> 
			<td style="color: #fff;">ФИО</td>
			<td><input type="text" name="FIO" value="" required=" " /></td>
		</tr>

		<tr>
			<td style="color: #fff;">Должность</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM posts WHERE ForEvent = 0";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodePost>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]'> $arr[1] </option>";
					}

					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>

		<tr>
			<td style="color: #fff;">Степень</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM degrees";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeDegree>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]'> $arr[1] </option>";
					}

					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>

		<tr>
			<td style="color: #fff;">Звание</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM ranks";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeRank>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]'> $arr[1] </option>";
					}

					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>

		<tr> 
			<td style="color: #fff;">Телефон</td>
			<td><input type="text" name="Phone" value="" required=" " /></td>
		</tr>

		<tr> 
			<td style="color: #fff;">Email</td>
			<td><input type="text" name="Email" value="" required=" " /></td>
		</tr>
		
		<tr>
			<td style="color: #fff;">Кафедра</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM cathedrae";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeCathedra>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]'> $arr[1] </option>";
					}

					echo "<option value = '' > </option>";echo "</select>";
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
