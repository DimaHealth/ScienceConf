<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновить</title>  
</head>
<body>
<form name="editform" action="?action=update&IDCountry=<?= htmlspecialchars($id) ?>" method="POST"> 

<table class="table" > 
  <tr > 
  <td style="background: #888; color: #fff;" >Страна</td> 
  <td><input type="text" name="Country" value="<?= htmlspecialchars($item["Country"]) ?>" /></td> 
  </tr> 
  <tr> 
  <td><input type="submit" value="Сохранить"></td> 
  <td><button type="button" onClick="history.back();">Отменить</button></td> 
  </tr> 
  </table> 
  </form> 
  </body>
  </html>