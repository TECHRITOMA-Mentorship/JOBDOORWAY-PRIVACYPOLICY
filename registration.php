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
    <title>Registration Form</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.css">
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
            <a class="nav-link" href="login.php"><input type="submit" class="btn btn-primary" value="login" name="submit" ></a>
		  </div>
		</div>
	  </nav>


   

<!--=======================================PHP SECTION===================================================-->


<div class="container" style="border: 1px solid; height: 500px; width: 60%; ">

<?php
if(isset($_POST["submit"])){

    $fullName = $_POST["fullname"];
    $eMail = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["repeat_password"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $passwordHashtwo = password_hash($confirmPassword, PASSWORD_DEFAULT);
    $errors = array();

    if(empty($fullName) OR empty($eMail) OR empty($password) OR empty($confirmPassword)){


        array_push($errors,"All fields are required");
    }

    if(!filter_var($eMail, FILTER_VALIDATE_EMAIL)){


        array_push($errors, "Email is not valid");
    }

    if(strlen($password)<8){


        array_push($errors, "Password must be atleast 8 characteres long");
    }

    if($password!==$confirmPassword){

        array_push($errors, "Password does not match");
    }
    //We need to connect to the database before checking if the email entered already exists
    require_once "database.php";
    $sql = "SELECT * FROM mine WHERE email='$eMail'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

     if($rowCount>0){

        array_push($errors, "Email already exists");
    }

    if(count($errors)>0){


        foreach($errors as $error){


            echo "<div class='alert alert-danger'>$error</div>";
        }
    }else{

        // we will insert the data into the database table users
        
        $sql = "INSERT INTO mine (fullname, email, password) VALUES( ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $preparestmt = mysqli_stmt_prepare($stmt, $sql);

        if($preparestmt){
            mysqli_stmt_bind_param($stmt,"sss",$fullName,$eMail,$passwordHash);
             mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully</div>";
        }else{

             
            die("Something went wrong");
        }
    }
}

?>
<!--=======================================form=======================-->
<form action="registration.php" method="post">


    <div class="form-group" style="margin:12px 0;">
    <label for="fullname">Full Name:</label>

        <input type="text" class="form-control" name="fullname" placeholder="Full Name" id="input">
    </div>

    <div class="form-group" style="margin:12px 0;">
    <label for="email">Email:</label>

        <input type="email" class="form-control" name="email" placeholder="Email" id="input">
    </div>

    <div class="form-group" style="margin:12px 0;">

        <label for="password" >Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Password"id="input">
    </div>

    <div class="form-group" style="margin:12px 0;">
        <label for="repeat_password">Confirm Password:</label>
        <input type="password" class="form-control" name="repeat_password" placeholder="Confirm Password" id="input">
    </div>

    <div class="form-btn">

        <input type="submit" class="btn btn-primary" name="submit" value="Register" id="input">
    </div>
</form>
<div>
<p>Already have an account? <a href="login.php">Log in Here</a></p>
</div>
</div>

         <!--============================================FOOTER==================================-->

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
   <script src="bootstrap-5.0.2-dist\js\bootstrap.js"></script>
</body>
</html>