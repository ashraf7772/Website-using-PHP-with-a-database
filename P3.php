<!DOCTYPE html>
<html>
<head>

  <title> P3 PHP </title>
</head>

<body>
	<h1>Aston Computing Projects</h1>

	
	<div class="start section">

		<h2>How to log in and add projects</h2>

        <?php
        $s1 = "Step 1: Register an account <br />";
        
        $s2 = "Step 2: Login to your account <br />";
        $s3 = "Step 3: Upload your project <br />";


        echo $s1 ;
        echo $s2;
        echo $s3;


        ?>

<li><a href="Login.php"><button>Login Page</button></a></li>
<li><a href="register.php"><button>register Page</button></a></li>	
<li><a href="ViewProjects.php"><button>View Projects Publically Page</button></a></li>	
	
	
	</div>


	<div class="mid section">
		
    <?php
    $images = array ("Aston Uni.jpg","upload.jpg");

    ?>

	<img src="Images/Aston Uni.jpg" alt="Aston pic" width="50" height="50">
	
	<img src="Images/upload.jpg" alt="upload pic" width="50" height="50">	

		
	</div>	

  <p> Login below or go to the login page</p>

  <?php include ('Login.php'); ?> 



</body>
</html>
