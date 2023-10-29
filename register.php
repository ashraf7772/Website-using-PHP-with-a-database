<?php

$db_host = '';
$db_name = '';
$username = '';
$password = '';


$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 

if (isset($_POST['submitted'])){
   
     require_once('connectdb.php');



       
     $username=isset($_POST['username'])?$_POST['username']:false;
     $password=isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;
     $email = isset($_POST['email']) ?$_POST['email'] : false;



     
     if (!($username)){
       echo "Your UserName is not valid or already taken";
       exit;

     }
     if (!($password)){
       exit("PassWord is not valid");
     }
    if (empty($email)) {
       exit("Email is not valid");
     }
    }


    try{ 
	
        $stat=$db->prepare("insert into users values(default,?,?,?)");
        $stat->execute(array($username, $password, $email));
        
        $id=$db->lastInsertId();
        echo "You are registered. Your ID is: $id  ";  	
        
     }
     catch (PDOexception $ex){
        echo "A database error has occurred. <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";
     }
    
     
    



?>


<!DOCTYPE html>
<html lang = "en">


    <head>
<title>Register Page</title>
</head>
<body>
<h3>Register Below</h3>


<form method = "post" action = "register.php">
    <p> UserName: <input type = "text" name = "username"/>  </p>
    <p> PassWord: <input type = "password" name = "password"/>  </p>
    <p> Email: <input type = "email" id="email" name="email">  </p>

    <input type = "submit" value = "Register" /> <br><br>
    <input type= "hidden" name= "submitted" value= "true"/>

</form>

<p>Already have an account? <a href="Login.php"> Login page </a>  </p>


</body>



</html>