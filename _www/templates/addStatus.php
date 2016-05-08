<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Добавление записи</title>  
  
</head>
<body>
 
  <form name="addform" action="?action=add&IDStatus=<?= htmlspecialchars($id) ?>" method="POST"> 
	<div class="col_66">
  <table class="table" > 
<tr> 
  <td style="color: #fff;">Статус</td>
  <td><input type="text" name="Status" value="" required=" " /></td>
  </tr>
  <tr>
  <td><input type="submit" value="Добавить"></td>
  <td><button type="button" onClick="history.back();">Отменить</button></td>
   </tr>
  </table>
  </form>
  </body>
  </html>
