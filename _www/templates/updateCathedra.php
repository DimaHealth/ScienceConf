<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="css/style.css">
	<title>Обновить</title>
</head>
<body>
	<form name="editform" action="?action=update&IDCathedra=<?= htmlspecialchars($id) ?>" method="POST"> 

	<table class="table"> 
		<tr> 
			<td>Кафедра</td> 
			<td><input type="text" name="Cathedra" value="<?= htmlspecialchars($item["Cathedra"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td>Телефон</td> 
			<td><input type="text" name="Phone" value="<?= htmlspecialchars($item["Phone"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td>E-mail</td> 
			<td><input type="text" name="Email" value="<?= htmlspecialchars($item["Email"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td>Факультет</td> 
			<td> 
				<?php
					require_once("dbconnect.php");

					$sql = "SELECT * FROM faculties";

					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeFaculty>";

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