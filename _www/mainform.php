<?php
session_start();
require("dbconnect.php");

// Проверяем если существуют данные в сессий.
if(isset($_SESSION['email']) && isset($_SESSION['password']) ){

// Вставляем данные из сессий в обычные переменные
$email = $_SESSION['email'];
$password = $_SESSION['password'];

// Делаем запрос к БД для выбора данных.
$query = " SELECT * FROM profiles WHERE Email = '$email' AND Password = '$password'";
$result = mysqli_query($connect, $query) or die ( "Error : ".mysqli_error($connect) ); 

/* Проверяем, если в базе нет пользователей с такими данными, то выводим сообщение об ошибке */
if(mysqli_num_rows($result) < 1)
{
	echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.html'>главную страницу</a>";
}
else
{


}

}else{
echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.html'>главную страницу</a>";
die();
}
?>
 <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- Basic Page Needs
    ================================================== -->
        <meta charset="utf-8">
        <title>НИЧ ДонНТУ</title>
        <meta name="description" content="">
        <!-- Mobile Specific Metas
    ================================================== -->
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
	
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
    </head>

 <body data-spy="scroll" data-target=".navbar-fixed-top">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
    	<div class="container">
    		<!-- <div class="row"> -->
                 <div class="navbar-header ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                 </div><!--Navbar header End-->
                 	<nav class="menu_main" id="bs-example-navbar-collapse-1" role="navigation">
                        <ul class="nav navbar-nav navbar-right">
										<li class="active"><a href="mainform.php">Main</a></li>
										<li><a href="addnewuser.php">Пользователи</a></li>
										<li><a href="tableofevents.php">Мероприятия</a></li><li><a href="tableofeventsFull.php">Мероприятия для Админа</a></li>
										<li><a href="addnewdictionary.php">Справочники</a></li>
										<li><a href="addnewreport.php">Генерация отчетности</a></li>
										<li><a href="addnewtables.php">Другие таблицы</a></li>
										<li></li>
										<li><a href="exit.php">Выйти</a></li>
                        </ul>
                     </nav>
                </div><!-- /.container-fluid -->
</header>
 <!-- Slider start -->
    <section id="slider_part">
         <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
            <!-- Indicators -->
         	 <ol class="carousel-indicators text-center">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
             </ol>

           	<div class="carousel-inner">
           	 	<div class="item active">
           	 		<div class="overlay-slide">
           	 			<img src="images/banner/p5.jpg" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                      <h2>НИЧ</h2>
               	 			<h3 class="animated2"> <font size="5"><b> Донецкий национальный технический университет </b>
							</br>Научно-исследовательская часть</br> Система учета мероприятий </font></h3>

               	 			<div class="line"></div>
               	 			<p class="animated3">Донецк 2016 </p>
               	 		</div>
           	 		</div>
           	 	</div>
                <div class="item">
                    <div class="overlay-slide">
                        <img src="images/banner/p3.jpg" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                    <h2>НИЧ</h2>
               	 			<h3 class="animated3"> </h3>
               	 			<div class="line"></div>
               	 			<p class="animated2"></p>
               	 		</div>
           	 		</div>
           	 	</div>
           	 	<div class="item">
                    <div class="overlay-slide">
                        <img src="images/banner/p10.jpg" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                    <h2>НИЧ</h2>
               	 			<h3 class="animated3"></h3>
               	 			<div class="line"></div>
               	 			<p class="animated2"></p>
               	 		</div>
           	 		</div>
           	 	</div>

           	 </div> 	 <!-- End Carousel Inner -->

            <!-- Controls -->
            <div class="slides-control ">
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                	<span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                	<span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
  	</section>
    <!--/ Slider end -->


<!-- Back To Top Button -->
    <div id="back-top">
        <a href="#slider_part" class="scroll" data-scroll>
            <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
        </a>
    </div>
    <!-- End Back To Top Button -->



<!-- Javascript Files
    ================================================== -->
    <!-- initialize jQuery Library -->

		<!-- initialize jQuery Library -->
        <!-- Main jquery -->
		    <script type="text/javascript" src="js/jquery.js"></script>
        <!-- Bootstrap jQuery -->
         <script src="js/bootstrap.min.js"></script>
        <!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Isotope -->
        <script src="js/jquery.isotope.js"></script>
        <!-- Pretty Photo -->
		    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
        <!-- SmoothScroll -->
        <script type="text/javascript" src="js/smooth-scroll.js"></script>
        <!-- Image Fancybox -->
        <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!-- Counter  -->
        <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
        <!-- waypoints -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>
        <!-- Bx slider -->
        <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
        <!-- Scroll to top -->
        <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
        <!-- Easing js -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
   		 <!-- PrettyPhoto -->
        <script src="js/jquery.singlePageNav.js"></script>
      	<!-- Wow Animation -->
        <script type="js/javascript" src="js/wow.min.js"></script>
        <!-- Google Map  Source -->
        <script type="text/javascript" src="js/gmaps.js"></script>
			 <!-- Custom js -->
        <script src="js/custom.js"></script>


 
    </body>
</html>
