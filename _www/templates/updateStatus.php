<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>
<form name="editform" action="?action=update&IDStatus=<?= htmlspecialchars($id) ?>" method="POST"> 

<table class="table"> 
  <tr> 
  <td>Статус</td> 
  <td><input type="text" name="Status" value="<?= htmlspecialchars($item["Status"]) ?>" /></td> 
  </tr> 
  <tr> 
  <td><input type="submit" value="Сохранить"></td> 
  <td><button type="button" onClick="history.back();">Отменить</button></td> 
  </tr> 
  </table> 
  </form> 
  </body>
  </html>