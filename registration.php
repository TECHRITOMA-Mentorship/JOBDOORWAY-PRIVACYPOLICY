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


    <div class="container">

<!--=======================================PHP SECTION===================================================-->


        <?php
        if (isset($_POST["register"])) {
            $full_name=$_POST["full_name"];
            $username=$_POST["username"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $passwordrepeat=$_POST["passwordrepeat"];
            $placeofbirth=$_POST["placeofbirth"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors= array();
            if (empty($full_name) OR empty($username) OR empty( $email)  OR empty($password) OR empty($passwordrepeat)  OR empty($placeofbirth)) {
                array_push($errors,"All fields are required");
            }
           
            if (strlen($password)<8) {
                array_push( $errors,"Password must be atleast 8 characters long");
            }
            if ($password!==$passwordrepeat) {
                array_push($errors, "Password does not match");
            }
            require_once "database.php";
            $sql = "SELECT * FROM mine WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors, "Email already exist");

            }
            if (count($errors)>0) {
                foreach ($errors as $errors) {
                    echo"<div class='alert alert-danger'>$errors</div>";
                }
            }else{
                
                $sql = "INSERT INTO mine (full_name , username, email, password, passwordrepeat, placeofbirth) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init ($conn);
                $preparestmt = mysqli_stmt_prepare($stmt,$sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt,"ssssss", $full_name, $username, $email,  $password, $passwordrepeat, $placeofbirth);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You Are Registered</div>";

                }else{
                    die("somthing went wrong");
                }
            }

        }


        ?>

        <!--==========================Registrationform=================================-->
        <div class="container" style="border:1px solid  black; width:600px;">
        <h1 >Registration Form</h1>
        <p>Please kindly fill the informations bellow</p>  
        <form action="registration.php" method="post" >
            <div class="form-group">
                <label for="full_name">Name</label>
                <input type="full_name" class="form-control" name="full_name" placeholder="enter your full name">
            </div>
            
            <div class="form-group">
                <label for="username">User name</label>
                <input type="text" class="form-control" name="username" placeholder="enter your user name" id="username" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="enter your email" id="email" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="enter your pasword" id="password" >
            </div>
            <div class="form-group">
                <label for="passwordrepeat">Re-enter Password</label>
                <input type="password" class="form-control" name="passwordrepeat" placeholder="re-enter password" id="passwordrepeat" >
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of birth</label>
                <input type="text" class="form-control" name="date_of_birth" placeholder="enter your date of birth" id="date_of_birth" >
            </div>
            <div class="form-group">
                <label for="placeofbirth">Place Of Birth</label>
                <input type="text" class="form-control" name="placeofbirth" placeholder="enter your place of birth" id="placeofbirth" >
            </div>

            <p>Already have and acount? <a href="login.php">Log in here</a></p>
            

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register" name="register" >
            </div>
            
        </form>
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