<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="css/style.css">
        <title>Добавление оценки</title>
    </head>

    <body>
        <form name="addform" action="?action=add" method="POST"> 
		<div class="col_66">
            <table class="table" > 
			
                <tr> 
                    <td style="color: #fff;">Ссылка на сборник</td>
                    <td><input type="url" name="ReferenceToCollection" value="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Эл. закрытый вид</td>
                    <td><input type="boolean" name="ElectronicCloseView" value="" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Эл. открытый вид</td>
                    <td><input type="boolean" name="ElectronicOpenView" value="" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Печатный вид</td>
                    <td><input type="boolean" name="PrintView" value="" required="" /></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Добавить"></td>
                    <td><button type="button" onClick="history.back();">Отменить</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>
