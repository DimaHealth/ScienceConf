<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="css/style.css">
	<title>Обновить</title>  
</head>
<body>
	<form name="editform" action="?action=update&IDCollection=<?= htmlspecialchars($id) ?>" method="POST"> 

	<table class="table"> 
		<tr> 
			<td>Ссылка на сборник</td> 
			<td><input type="text" name="ReferenceToCollection" value="<?= htmlspecialchars($item["ReferenceToCollection"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td>Эл. закрытый вид</td> 
			<td><input type="boolean" name="ElectronicCloseView" value="<?= htmlspecialchars($item["ElectronicCloseView"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td>Эл. открытый вид</td> 
			<td><input type="boolean" name="ElectronicOpenView" value="<?= htmlspecialchars($item["ElectronicOpenView"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td>Печатный вид</td> 
			<td><input type="boolean" name="PrintView" value="<?= htmlspecialchars($item["PrintView"]) ?>" /></td> 
		</tr> 

		<tr> 
			<td><input type="submit" value="Сохранить"></td> 
			<td><button type="button" onClick="history.back();">Отменить</button></td> 
		</tr> 

	</table> 
	</form> 
</body>
</html>