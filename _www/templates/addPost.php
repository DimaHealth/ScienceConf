<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Добавление записи</title>  
  
</head>
<body>
 
  <form name="addform" action="?action=add&IDPost=<?= htmlspecialchars($id) ?>" method="POST"> 

  <table class="table" > 
<tr> 
  <td>Должность</td>
  <td><input type="text" name="Post" value="" required=" " /></td>
  </tr>
  <tr>
  <td>Для мероприятия</td>
  <td><input type="boolean" name="ForEvent" required=" "/></td>
  </tr>
  <td><input type="submit" value="Добавить"></td>
  <td><button type="button" onClick="history.back();">Отменить</button></td>
   </tr>
  </table>
  </form>
  </body>
  </html>
