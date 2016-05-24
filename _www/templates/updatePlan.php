<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="css/style.css">
	<title>Обновить</title>  
</head>
<body>
	<form name="editform" action="?action=update&IDPlan=<?= htmlspecialchars($id) ?>" method="POST"> 
<div class="col_66">
	<table class="table"> 
		<tr> 
			<td style="color: #fff;">Календарный год</td> 
			<td><input type="text" name="CalendarYear" value="<?= htmlspecialchars($item["CalendarYear"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Факультет</td> 
			<td style="color: #000;"> 
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM faculties";

					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeFaculty>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]' > $arr[1]</option>";
					}

					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Зам. декана</td> 
			<td style="color: #000;"> 
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM employees";

					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeZamDec>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]' > $arr[1]</option>";
					}

					echo "<option value = '' > </option>";echo "</select>";
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