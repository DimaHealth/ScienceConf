<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="css/style.css">
	<title>Обновить</title>
</head>
<body>
	<form name="editform" action="?action=update&IDUniversity=<?= htmlspecialchars($id) ?>" method="POST"> 
	<div class="col_66">
	<table class="table"> 
		<tr> 
			<td style="color: #fff;">Университет</td> 
			<td><input type="text" name="University" value="<?= htmlspecialchars($item["University"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Телефон</td> 
			<td><input type="text" name="Phone" value="<?= htmlspecialchars($item["Phone"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Веб-сайт</td> 
			<td><input type="text" name="Website" value="<?= htmlspecialchars($item["Website"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">E-mail</td> 
			<td><input type="text" name="Email" value="<?= htmlspecialchars($item["Email"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td style="color: #fff;">Город</td> 
			<td style="color: #000;"> 
			<?php
					require("dbconnect.php");

					$sql = "SELECT IDCity, City, Country FROM cities INNER JOIN countries ON CodeCountry = IDCountry";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeCity>";

					while($arr = mysqli_fetch_array($result_select)){
							$selected = $arr['IDCity'] == $item['CodeCity'];
						
						echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1], $arr[2] </option>";
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