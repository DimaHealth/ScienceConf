<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>
<form name="editform" action="?action=update&IDPublicator=<?= htmlspecialchars($id) ?>" method="POST"> 
<div class="col_66">
<table class="table">
		<tr>
			<td style="color: #fff;">Является ли школьником</td>
			<td><input type="boolean" name="IsSchoolChild" required=" " value="<?= htmlspecialchars($item["IsSchoolChild"]) ?>"/></td>
		</tr>
		
		<tr>
			<td style="color: #fff;">Очное (0) или заочное (1) отделение</td>
			<td><input type="boolean" name="TypeOfStudy"  value="<?= htmlspecialchars($item["TypeOfStudy"]) ?>"/></td>
		</tr>
		
		<tr>
			<td style="color: #fff;">ФИО</td>
			<td><input type="text" name="FIO" required=" " value="<?= htmlspecialchars($item["FIO"]) ?>"/></td>
		</tr>
		
		<tr> 
			<td style="color: #fff;">Группа</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");
					$sql = "SELECT * FROM groups";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/
					echo "<select  name = CodeGroup>";
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr[1]</option>";
					}
					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
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
					while($arr = mysqli_fetch_array($result_select)) {
						echo "<option value = '$arr[0]' > $arr[1]</option>";
					}
					echo "<option value = '' > </option>";echo "</select>";
				?>
			</td>
		</tr>
		
		<tr>
			<td style="color: #fff;">Телефон</td>
			<td><input type="text" name="Phone" required=" " value="<?= htmlspecialchars($item["Phone"]) ?>"/></td>
		</tr>
		
		<tr>
			<td style="color: #fff;">E-mail</td>
			<td><input type="text" name="Email" required=" " value="<?= htmlspecialchars($item["Email"]) ?>"/></td>
		</tr>
		
		<tr>
			<td style="color: #fff;">Заработанные баллы</td>
			<td><input type="number" name="ScoredPoints" required=" " value="<?= htmlspecialchars($item["ScoredPoints"]) ?>"/></td>
		</tr>
		
	
		<tr>
			  <td><input type="submit" value="Сохранить"></td> 
			  <td><button type="button" onClick="history.back();">Отменить</button></td> 
		</tr> 
  </table>
</div>  
  </form> 
  </body>
  </html>