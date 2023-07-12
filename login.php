<?php
  session_start();
  if(isset($_SESSION["mine"])){
   header("location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--HEADER-->
    <nav class="navbar navbar-expand-lg ">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">ENG. PAUL LIMITED</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav m-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
				<a class="nav-link dropdown-toggle" href="dropdown-menu" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
		  </div>
		</div>
	  </nav>

      <!--======================================PHP PART=======================================-->

      <div class="container"  style="border: 1px solid; height: 500px; width: 40%; ">

    <?php
       if (isset($_POST["login"])){
         $eMail = $_POST["email"];
         $password = $_POST["password"];
         require_once "database.php";
         $sql = "SELECT * FROM mine WHERE email = '$eMail'";
         $result = mysqli_query($conn, $sql);
         $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

         if($user){
            if(password_verify($password, $user["password"])){
               session_start();
               $_SESSION["mine"] = "yes";
               header("location: index.php");
               die();
            }else{
               echo "<div class='alert alert-danger'>Password does not match</div>";
            }
         }else{
            echo "<div class='alert alert-danger'>Email does not match</div>";
         }

       }
    ?>

    <form action="login.php" method="post">

        <div class="form-group" style="margin:18px 0;">

            <label for="email">Enter your Email:</label>
            <input class="form-control" name="email" type="email" placeholder="Email">
        </div>

        <div class="form-group" style="margin:18px 0;">

            <label for="password">Enter your Password:</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
        </div>

        <div class="form-btn">
            <input type="submit" value="login" name="login" class="btn btn-primary">
        </div>
    </form>
    <div><p>Don't have and account? <a href="registration.php">Register Here</a></p></div>
    <div class="mt-3">
          <a href="#">Forgot password?</a>
        </div>
 </div>
        
      </div>
      




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
                    <li><a href="home.html" style="text-decoration: none; color: grey;">Home</a></li>
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
        <p class="col-md-5" style="color: gray;">&copyCopyright Eng.PAUL &copyCopyright JORDINO SOFT</p>
        <p class="col-md-6" style="color: gray;">Developed by Eng PAUL in colaboration with JORDINO SOFT INTERPRISE</p>
        <p class="col-md-1" style="color: gray;"><i class="fa-brands fa-twitter" style="margin: 0 3px;"></i> <i class="fa-brands fa-facebook" style="margin: 0 3px;"></i> <i class="fa-brands fa-instagram" style="margin: 0 3px;"></i></p>
      </div>
    </div>
</div>
   
   </footer>

   <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
	<script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</body>
</html>
