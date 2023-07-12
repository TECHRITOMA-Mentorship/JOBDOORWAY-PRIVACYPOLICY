<?php
  session_start();
  if(!isset($_SESSION["mine"])){
   header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: grey;">
	<nav class="navbar navbar-expand-lg ">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">ENG. PAUL LIMITED</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav m-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Services</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Blog</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link" href="#">
				  About
				</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="#">Contact</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  More
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <li><a class="dropdown-item" href="#">Books</a></li>
				  <li><a class="dropdown-item" href="#">Questions</a></li>
				  <li><hr class="dropdown-divider"></li>
				  <li><a class="dropdown-item" href="#">Abstract</a></li>
				</ul>
			  </li>
			</ul>
			
			  <a class="nav-link" href="registration.php"><button class="btn0" >Register</button></a>
			  <a class="nav-link" href="login.php"><button class="btn1 ">Login</button></a>
			
		  </div>
		</div>
	  </nav>

	  <!--====================Main section==================-->
	  <section class="main py-5">
		<div class="container py-5">
			<div class="row">
				<div class="col-lg-7">
					<h1>Find The Best <br> Coders Here</h1>
					<input  type="search" placeholder="Search" aria-label="Search">
					<button class="btn2 mt-5" type="submit">Search</button>
				</div>
			</div>
		</div>
	  </section>

	  <!--===============Section two==============-->
	  <section class="good">
		<div class="bad">
			<div class="row">
				<div class="col-lg-4">
					<h1>WHAT WE DO</h1><br>
					<p>We help you with any problem you have in coding <br>
					and we give you solutions to the questions <br> </p>
				</div>
				<div class="col-lg-4">
					<h1>HOW YOU GET TO US</h1><br>
					<p>Just type in the problem and the solutions will display to you <br>
					or yoy can get to us directly through ourcontacts below at the bottom <br> </p>
				</div>
				<div class="col-lg-4">
					<h1>WHAT ELSE YOU WANT</h1><br>
					<p>Very simple just contact us bellow <br>
					we provide you with all you need either coding , building websites and many more <br> </p>
				</div>
			</div>
		</div>
	  </section>

	  <!--=====================Carousel and Cart=============--> 
	  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" style="width: 50%; margin-left: 20%;">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 3"></button>

		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="RI.png" alt="" class="d-block w-100">
			</div>
			<div class="carousel-item">
				<img src="pio.jpg" alt=""clas="d-block w-100">
			</div>
		</div>
		<button class="carousel-control-prev btn-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			
		</button>
		<button class="carousel-control-next btn-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true" ></span>
			
		</button>
	  </div>

	  <!--==============section3===============-->
	  <section class="boy">
		<div class="him">
			<h1 style="text-align: center; margin-top: 2em;">SOME LANGUAGES WE CAN HELP</h1>
			<div class="row" style="margin-top: 2em;">
				<div class="col-lg-3">
					<h2>BOOTSTRAP-5</h2>
					<img  src="th.jpg" alt="" srcset="">
				</div>
				<div class="col-lg-3">
					<h2>SUBLIME TEXT</h2>
					<img src="th (1).jpg" alt="">
				</div>
				<div class="col-lg-3">
					<h2>HTML LANGUAGE</h2>
					<img style="height: 4em; width: 6em;" src="download.jpg" alt="">
				</div>
				<div class="col-lg-3">
					<h2>DREAM WEAVER</h2>
					<img src="th (2).jpg" alt="">
				</div>
			</div>
		</div>
	  </section>

			<!--=================Section4============-->
			

<!--===================FOOTER=============-->
<footer style="background-color: rgba(31, 30, 30, 0.753); color:white; margin-top: 50px; padding-top: 60px;">
    <div class="container">
     <div class="row">

        <div class="col-md-4">
            <h3>About Eng PAUL</h3>
            
                <p style="color: grey;">He is a  very intelligent and smart coder</p>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				  </form>
            
       </div>

       <div class="col-md-4 container">
        <h3>Quick Links</h3>
        <div class="row">  
                <ul class="col-md-6" style="list-style: none;">
                    <li><a href="#" style="text-decoration: none; color: grey;">Home</a></li>
                    <li><a href="#" style="text-decoration: none; color: gray;">About</a></li>
                    <li><a href="#" style="text-decoration: none; color: grey;">Go to top</a></li>
                </ul>

                <ul class="col-md-6" style="list-style: none;">
                    <li><a href="#" style="color: grey;">Coders</a></li>
                    <li><a href="#" style="color: grey;">Contact Us</a></li>
                </ul>
                </div>
                </div>
    

        <div class="col-md-4">
            <h3>Eng. PAUL Contact</h3>
            <ul class="col-md-6" style="list-style: none; color: grey;">
                <li>Address : Molyko -Buea</li>
                <li><a href="#" style="text-decoration: none; color: grey;">Email:ayukpaulk23@gmail.com</a></li>
                <li>Phone : +237679495102</li>
            </ul>

        </div>
     </div>
    </div>

    <div class="container-fluid" style="background-color: rgb(31, 30, 30)">
    <div class="container">
        <div class="row">
        <p class="col-md-5" style="color: gray;">&copyCopyright Eng.PAUL &copyCopyright JORDINOSOFT</p>
        <p class="col-md-6" style="color: gray;">Developed by Eng PAUL in colaboration with JORDINOSOFT INTERPRISE</p>
        <p class="col-md-1" style="color: gray;"><i class="fa-brands fa-twitter" style="margin: 0 3px;"></i> <i class="fa-brands fa-facebook" style="margin: 0 3px;"></i> <i class="fa-brands fa-instagram" style="margin: 0 3px;"></i></p>
      </div>
    </div>
</div>
   
   </footer>

   	<script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
	<script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</body>
</html>