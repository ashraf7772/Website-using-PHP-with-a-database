
<?php

$db_host = '';
$db_name = '';
$username = '';
$password = '';


$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 



if (isset($_POST['submitted']))
   
     require_once('connectdb.php');


$title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$phase = $_POST['phase'];
$description = $_POST['description'];
$uid=isset($_POST['uid'])?$_POST['uid']:false;


if (!($uid)){
    echo "Your User ID does not exist";
    
}
    try{ 
	

        $stat=$db->prepare("insert into projects values(default,?,?,?,?,?,?)");
        $stat->execute(array($title, $start_date, $end_date ,$phase ,$description , $uid));
        
        $pid=$db->lastInsertId();
        echo "You are registered. Your Project ID is: $pid  ";  	
        
     }
     catch (PDOexception $ex){
        echo "A database error has occurred. <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";
     }
    
     
    

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Projects Page</title>
</head>
<body>
    <h1>Upload Projects Here</h1>
    <br>
    <li><a href="Projects.php"><button>Projects Page</button></a></li>
    <p>Would you like to log out? <a href="logout.php">Log out</a>  </p>
    <br>
<h3>Upload your projects Below</h3>



<form method = "post" action = "AddProject.php">
    <p> Title: <input type = "text" name = "title"/>  </p>
    <p> started: <input type = "date" name = "start_date"/>  </p>
    <p> ended: <input type = "date" name = "end_date"/>  </p>
    <p>What phase</p>
        <label><input type="radio" name ="phase" value="design"/>design </label>
        <label><input type="radio" name ="phase" value="complete"/> complete</label></br></br> 
        <label><input type="radio" name ="phase" value="testing"/> testing </label>
        <label><input type="radio" name ="phase" value="deployment"/> deployment</label></br></br> 
        <label><input type="radio" name ="phase" value="development"/> development</label></br></br> 

    
    <p> description: <input type = "text" name = "description"/>  </p>
    <p> userid: <input type = "number" name = "uid"/>  </p>






    <input type = "submit" value = "Add" /> <br><br>
    <input type= "hidden" name= "submitted" value= "true"/>

</form>

</body>



</html>


