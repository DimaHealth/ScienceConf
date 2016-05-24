<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <!-- CSS
         ================================================== -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <!-- Animation -->
        <link rel="stylesheet" href="css/animate.css" />
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/owl.theme.css"/>
        <!-- Pretty Photo -->
        <link rel="stylesheet" href="css/prettyPhoto.css"/>
        <!-- Main color style -->
        <link rel="stylesheet" href="css/red.css"/>
        <!-- Template styles-->
        <link rel="stylesheet" href="css/custom.css" />
        <!-- Responsive -->
        <link rel="stylesheet" href="css/responsive.css" />
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		  <link rel="stylesheet" href="css/demo.css">

  <!-- Стили для адаптивного фонового изображения -->
  <link rel="stylesheet" href="css/styleimg.css">
	
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<title>Добавление записи</title>  
	
</head>
<body>
	<form name="addform" action="?action=add&IDCathedra=<?= htmlspecialchars($id) ?>" method="POST"> 
	<div class="col_66">
	<table class="table" > 
		<tr> 
			<td style="color: #fff;">Кафедра</td>
			<td><input type="text" name="Cathedra" value="" required=" " /></td>
		</tr>

		<tr> 
			<td style="color: #fff;">Телефон</td>
			<td><input type="text" name="Phone" value="" required=" " /></td>
		</tr>

		<tr> 
			<td style="color: #fff;">E-mail</td>
			<td><input type="text" name="Email" value="" required=" " /></td>
		</tr>

		<tr>
			<td style="color: #fff;">Факультет</td>
			<td style="color: #000;">
				<?php
					require("dbconnect.php");

					$sql = "SELECT * FROM faculties";
					$result_select = mysqli_query($connect, $sql);

					/*Выпадающий список*/

					echo "<select  name = CodeFaculty>";

					while($arr = mysqli_fetch_array($result_select)){
						echo "<option value = '$arr[0]'> $arr[1] </option>";
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
