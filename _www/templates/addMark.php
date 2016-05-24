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
                    <td style="color: #fff;">Оценки</td>
                    <td><input type="text" name="Mark" value="" required="" /></td>
                </tr>

                <tr> 
                    <td style="color: #fff;">Мероприятие</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM events";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeEvent>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[1]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" value="Добавить"></td>
                    <td><button type="button" onClick="history.back();">Отменить</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>
