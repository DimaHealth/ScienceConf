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
	<div class="col_66">
	<table class="table"> 
		<tr> 
			<td style="color: #fff;">Кафедра</td> 
			<td><input type="text" name="Cathedra" value="<?= htmlspecialchars($item["Cathedra"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Телефон</td> 
			<td><input type="text" name="Phone" value="<?= htmlspecialchars($item["Phone"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">E-mail</td> 
			<td><input type="text" name="Email" value="<?= htmlspecialchars($item["Email"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Факультет</td> 
			<td style="color: #000;"> 
				<?php
					require("dbconnect.php");

					$sql = "SELECT `IDFaculty`,`Faculty`, University FROM `faculties` INNER JOIN universities ON CodeUniversity = IDUniversity";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeFaculty>";

					while($arr = mysqli_fetch_array($result_select)){
							$selected = $arr['IDFaculty'] == $item['CodeFaculty'];
						
						echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1],$arr[2]</option>";
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