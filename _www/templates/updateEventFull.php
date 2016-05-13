<html>
   <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Добавление записи</title>  
  
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
                    <td><input type="text" name="StartDate" value="<?= htmlspecialchars($item["StartDate"]) ?>" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Дата окончания</td>
                    <td><input type="text" name="ExpirationDate" value="<?= htmlspecialchars($item["ExpirationDate"]) ?>" required="" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Кафедра</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM cathedrae";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeCathedra>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[1]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Тип мероприятия</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM eventtypes";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeEventType>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[1]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Ссылка на пресс-релиз</td>
                    <td><input type="text" name="PressReleaseRef" value="<?= htmlspecialchars($item["PressReleaseRef"]) ?>" required="" /></td>
                </tr>
				
                <tr> 
                    <td style="color: #fff;">Ссылка на пресс-релиз</td>
                    <td><input type="text" name="PostReleaseRef" value="<?= htmlspecialchars($item["PostReleaseRef"]) ?>" required="" /></td>
                </tr>

                <tr> 
                    <td style="color: #fff;">Код ответственного секретаря</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM employees";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeExecutiveSecretary>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[1]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>

                <tr> 
                    <td style="color: #fff;">Год плана</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM plans";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodePlan>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[1]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>

				<tr> 
                    <td style="color: #fff;">Номер приказа</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM orders";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeOrder>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[2]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Количество преподавателей ДонНТУ</td>
                    <td><input type="text" name="NumOfTeachersDonNTU" value="<?= htmlspecialchars($item["NumOfTeachersDonNTU"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Статус</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM statuses";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeStatus>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[2]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>

				<tr> 
                    <td style="color: #fff;">Уровень</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM levels";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeLevel>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[2]</option>";
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
                    <td style="color: #fff;">Проведено ли</td>
                    <td><input type="text" name="isCarried" value="<?= htmlspecialchars($item["isCarried"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Отменено ли</td>
                    <td><input type="text" name="isCancelled" value="<?= htmlspecialchars($item["isCancelled"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Отложено ли</td>
                    <td><input type="text" name="isPostponed" value="<?= htmlspecialchars($item["isPostponed"]) ?>" /></td>
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
                    <td style="color: #fff;">Подтверждены ли статус и вид</td>
                    <td><input type="text" name="areStatusAndTypeConfirmed" value="<?= htmlspecialchars($item["areStatusAndTypeConfirmed"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Изменена ли дата</td>
                    <td><input type="text" name="isDateChanged" value="<?= htmlspecialchars($item["isDateChanged"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Изменены ли вид и статус</td>
                    <td><input type="text" name="areViewAndStatusChanged" value="<?= htmlspecialchars($item["areViewAndStatusChanged"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Изменено ли имя</td>
                    <td><input type="text" name="isNameChanged" value="<?= htmlspecialchars($item["isNameChanged"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Предыдущее мероприятие</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM events";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodePreviousEvent>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[2]</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Вынесено ли за план</td>
                    <td><input type="text" name="isCarriedOutsidePlan" value="<?= htmlspecialchars($item["isCarriedOutsidePlan"]) ?>" /></td>
                </tr>
				
				<tr> 
                    <td style="color: #fff;">Сборник</td>
                    <td style="color: #000;">
                        <?php
                            require_once("dbconnect.php");
                            $sql = "SELECT * FROM collections";
                            $result_select = mysqli_query($connect, $sql);

                            /*Выпадающий список*/
                            echo "<select  name = CodeCollection>";
                            while($arr = mysqli_fetch_array($result_select)) {
                                echo "<option value = '$arr[0]' > $arr[2]</option>";
                            }
                            echo "</select>";
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
