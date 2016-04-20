<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<?php
require_once("dbconnect.php");

/* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные. Таким образом, мы застраховываемся от хостингов, которые не поддерживают глобальные переменные. */
if(isset($_POST["r_name"])){ $r_name = $_POST["r_name"]; }
if(isset($_POST["r_startdate"])){ $r_startdate = $_POST["r_startdate"]; }
if(isset($_POST["r_cathedrae"])){ $r_cathedrae = $_POST["r_cathedrae"]; }
if(isset($_POST["r_eventtype"])){ $r_eventtype = $_POST["r_eventtype"]; }
if(isset($_POST["r_expirationdate"])){ $r_expirationdate = $_POST["r_expirationdate"]; }
if(isset($_POST["r_pressrelease"])){ $r_pressrelease = $_POST["r_pressrelease"]; }
if(isset($_POST["r_postrelease"])){ $r_postrelease = $_POST["r_postrelease"]; }
if(isset($_POST["r_numofteachers"])){ $r_numofteachers = $_POST["r_numofteachers"]; }
if(isset($_POST["r_website"])){ $r_website = $_POST["r_website"]; }
if(isset($_POST["r_referenceToProgram"])){ $r_referenceToProgram = $_POST["r_referenceToProgram"]; }
if(isset($_POST["r_expectedCountries"])){ $r_expectedCountries = $_POST["r_expectedCountries"]; }
if(isset($_POST["r_addevent"])){ $r_addevent = $_POST["r_addevent"]; }
print ($r_cathedrae);
print ($r_eventtype);

/* Проверяем если была нажата кнопка зарегистрироваться. Если да, то вводим информацию в БД, иначе, значит что кнопка не была нажата, и пользователь зашел на страницу напрямую. Поэтому выводим ему сообщение об этом. */
if(isset($r_addevent))
{
	
/* Формируем запрос к БД для ввода данных */
$query = " INSERT INTO `events`(`EventName`, `StartDate`,`ExpirationDate`, `PressReleaseRef`,
 `PostReleaseRef`, `NumberOfTeachersDonNTU`,  `Website`, 
`ReferenceToProgram`, `ExpectedCountries`,
`CodeCathedra`,`CodeEventType`) 
 VALUES ('$r_name','$r_startdate','$r_expirationdate',
 '$r_pressrelease','$r_postrelease','$r_numofteachers','$r_website',
 '$r_referenceToProgram','$r_expectedCountries','$r_cathedrae',
'$r_eventtype')";

$result = mysqli_query($connect, $query) or die ( "Error : ".mysqli_error($connect) );


// Если все нормально то выводим сообщение.
if($result)
{
	header('Location: /_www/tableofevents.php');

  }
  
    echo '</tbody>';
  echo '</table>';
echo"Good! <a href='addnewevent.php'>Come Back.</a> ";
exit();
}

else{
	echo "Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. 
Вы <a href='index.php'>";
}
?>