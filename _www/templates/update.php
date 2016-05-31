<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Обновление записи</title>  
  
</head>
	<body>
        <form name="addform" action="?action=update&IDEvent=<?= htmlspecialchars($id) ?>" method="POST"> 
		<div class="col_66">
            <table class="table" > 
								
                <tr> 
                    <td style="color: #fff;">Название</td>
                    <td><input type="text" name="EventName" value="<?= htmlspecialchars($item["EventName"]) ?>" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Дата начала</td>
                    <td><input type="date" name="StartDate" value="<?= htmlspecialchars($item["StartDate"]) ?>" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Дата окончания</td>
                    <td><input type="date" name="ExpirationDate" value="<?= htmlspecialchars($item["ExpirationDate"]) ?>" required="" /></td>
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
                                	$selected = $arr['IDCathedra'] == $item['CodeCathedra'];
						
						echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Тип мероприятия</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM eventtypes";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeEventType>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                	$selected = $arr['IDEventType'] == $item['CodeEventType'];
						
						echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Ссылка на пресс-релиз</td>
                    <td><input type="text" name="PressReleaseRef" value="<?= htmlspecialchars($item["PressReleaseRef"]) ?>" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Ссылка на пост-релиз</td>
                    <td><input type="text" name="PostReleaseRef" value="<?= htmlspecialchars($item["PostReleaseRef"]) ?>" required="" /></td>
                </tr>

                <tr> 
                    <td style="color: #fff;">Ответственный секретарь</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM employees";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeExecutiveSecretary>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                	$selected = $arr['IDEmployee'] == $item['CodeExecutiveSecretary'];
						
									echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                           echo "</select>";
                        ?>
                    </td>
                </tr>

                <tr> 
                    <td style="color: #fff;">Год плана</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM plans";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodePlan>";
                            while($arr = mysqli_fetch_array($result_select)) {
                               	$selected = $arr['IDPlan'] == $item['CodePlan'];
								echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>

				<tr> 
                    <td style="color: #fff;">Номер приказа</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM orders";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeOrder>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                	$selected = $arr['IDOrder'] == $item['CodeOrder'];
						
									echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[2]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Количество преподавателей ДонНТУ</td>
                    <td><input type="number" name="NumberOfTeachersDonNTU" value="<?= htmlspecialchars($item["NumberOfTeachersDonNTU"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Статус</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM status";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeStatus>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                	$selected = $arr['IDStatus'] == $item['CodeStatus'];
						
									echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                           echo "</select>";
                        ?>
                    </td>
                </tr>

				<tr> 
                    <td style="color: #fff;">Уровень</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM levels";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeLevel>";
                            while($arr = mysqli_fetch_array($result_select)) {
                              	$selected = $arr['IDLevel'] == $item['CodeLevel'];
						
								echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Вэб-сайт</td>
                    <td><input type="text" name="Website" value="<?= htmlspecialchars($item["Website"]) ?>"/></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Ссылка на программу</td>
                    <td><input type="text" name="ReferenceToProgram" value="<?= htmlspecialchars($item["ReferenceToProgram"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Комментарий</td>
                    <td><input type="text" name="Comments" value="<?= htmlspecialchars($item["Comments"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Предыдущее мероприятие</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM events";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodePreviosEvent>";
                            while($arr = mysqli_fetch_array($result_select)) {
                               	$selected = $arr['IDEvent'] == $item['CodePreviosEvent'];
								echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Сборник</td>
                    <td style="color: #000;">
                        <?php
                            require("dbconnect.php");
                            $sql = "SELECT * FROM collections";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeCollection>";
                            while($arr = mysqli_fetch_array($result_select)) {
                               	$selected = $arr['IDCollection'] == $item['CodeCollection'];
								echo "<option value = '$arr[0]'".($selected ? "selected" : "")."> $arr[1]</option>";
                            }
                            echo "<option value = '' > </option>";echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Ожидаемые страны</td>
                    <td><input type="text" name="ExpectedCountries" value="<?= htmlspecialchars($item["ExpectedCountries"]) ?>" /></td>
                </tr>
				
                <tr>
                    <td><input type="submit" value="Сохранить"></td>
                    <td><button type="button" onClick="history.back();">Отменить</button></td>
                </tr>
            </table>
        </form>
    </body>
  </html>
