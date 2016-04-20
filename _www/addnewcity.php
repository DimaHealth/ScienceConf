
<form action="addnewcityscr.php" method="post" name="r_form2" >
<table>
<tr>
<td> Город*: </td>
<td> <input type="text" name="r_city" required=" " /> </td>
</tr>
<tr>
<td> Страна*: </td>
<td>
 <?php
require_once("dbconnect.php");

$sql = "SELECT * FROM countries";

$result_select = mysqli_query($connect, $sql);


/*Выпадающий список*/

echo "<select  name = r_country>";

while($arr = mysqli_fetch_array($result_select)){

echo "<option value = '$arr[0]' > $arr[1]</option>";

}

echo "</select>";

?> 
</td>
</tr>
<tr>
<td colspan="2"> <input type="submit" name="r_addcity" value="Добавить" /> </td>
</tr>
</table>
</form>