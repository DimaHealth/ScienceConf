<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Генерация отчета за период</title>  
  
</head>
	<body>
        <form name="addform" action="?action=add" method="POST"> 
		<div class="col_66">
            <table class="table" > 
               <tr> 
                    <td style="color: #fff;">Дата начала</td>
                    <td><input type="date" name="StartDate" value="" required ="" /></td>
                </tr>
				<tr> 
                    <td style="color: #fff;">Дата окончания</td>
                    <td><input type="date" name="EndDate" value="" required ="" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Сгенерировать"></td>
                    <td><button type="button" onClick="history.back();">Отменить</button></td>
                </tr>
            </table>
        </form>
    </body>
  </html>
