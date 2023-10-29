<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<li><a href="P3.php"><button>Home Page</button></a></li>
</head>
<body>


<?php


if (isset($_POST['submitted'])){

  if ( !isset($_POST['username'], $_POST['password']) ) {


   exit('Fill in the username and password fields');
    }


  
  require_once ("connectdb.php");

  try {

    $stat = $db->prepare('SELECT password FROM users WHERE username = ?');

           $stat->execute(array($_POST['username']));
      
   
       if ($stat->rowCount()>0){  

      $row=$stat->fetch();

      if (password_verify($_POST['password'], $row['password'])){ 
        
       
             session_start();

        $_SESSION["username"]=$_POST['username'];

        header("Location:Projects.php");

        
        exit();
      
      } else {
       echo "<p> Error logging in because your password doesn't match </p>";
         }
      } else {
     
      echo "<p> Error logging in because your username wasn't found </p>";
      }
  }
  catch(PDOException $ex) {

    echo("Failed to connect to database.<br>");
  echo($ex->getMessage());
    exit;
  }

}



?>





<h3>Login Below</h3>
<form action = "Login.php" method = "post">

    <div>
      
            <label for="username">Username:</label>

            <input type="text" id="username" name="username" required><br>
          
            <label for="password">Password:</label>

            <input type="password" id="password" name="password" required><br>

          
            

            <input type="submit" value="Login" />

	    <input type="reset" value="reset"/>

      <input type="hidden" name="submitted" value="TRUE" />
         


    </div>
 
    <p> Have you not registered yet? <a href="register.php">register here</a> </p>

</form>






</body>



</html>