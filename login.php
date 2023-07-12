<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN PAGE</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
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
      <!--============PHP PART======-->
      <?php
      if (isset($_POST["login"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        
        require_once "database.php";

        $sql = "SELECT * FROM mine WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $mine = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($mine) {
            if (password_verify($password, $mine["password"])) {
                header("location: index.php");
                die ();
            }else{
                echo "<div class='alert alert-danger'>Pasword does notmatch</div>";
             }
        }else{
             echo "<div class='alert alert-danger'>Email does notmatch</div>";
        }
      }
      ?>
      <!--========section============-->
      <div class="container" style="border: 1px solid; width: 500px;">
        <h1>Login Page</h1>
        <form action="login.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control"  name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <button type="submit" name="login" value="login" class="btn btn-primary">Login</button>
          <div class="form-check mb-3">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
          </div>

        </form>
        <div class="mt-3">
          <a href="#">Forgot password?</a>
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