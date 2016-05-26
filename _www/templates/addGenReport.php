<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Добавление записи</title>  
  
</head>
	<body>
        <form name="addform" action="?action=add" method="POST"> 
		<div class="col_66">
            <table class="table" > 

            	<tr> 
                    <td style="color: #fff;">Название мероприятия</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
							$CodeConference = 3;
							$CodeOlympic = 4;
                            $sql = "SELECT * FROM events WHERE CodeEventType = $CodeConference OR CodeEventType = $CodeOlympic";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = IDEvent>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[1]</option>";
                            }
                           echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Сгенерировать"></td>
                    <td><button type="button" onClick="history.back();">Отменить</button></td>
                </tr>
            </table>
        </form>
    </body>
  </html>
