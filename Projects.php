<!DOCTYPE html>
<html>
<head>
<title>Projects Page</title>
</head>
<body>
    <h1>Projects</h1>
    <br>
    <li><a href="P3.php"><button>Home Page</button></a></li>
    <li><a href="AddProject.php"><button>Add Project Page</button></a></li>
    <p>Would you like to log out? <a href="logout.php">Log out</a>  </p>
    <br>
<h3>Upload your projects On the Add Projects page <a href="AddProject.php">here</a></h3>

<form action = "LoggedInSearch.php" method = "post">

<label for="search">Search Projects:</label>
<input type="search" id="search" name="search">

</form>


<?php
session_start();

if (! isset($_SESSION['username'])){
header("Location: Login.php");
exit();
}

$username=$_SESSION['username'];
	echo "<h4> Welcome ".$_SESSION['username']." </h4>";

require_once ('connectdb.php');
try {
    $query="SELECT  * FROM  projects ";
    
    $rows =  $db->query($query);
    

    if ( $rows && $rows->rowCount()> 0) {
    
    ?>	
<table cellspacing="0"     cellpadding="5"    id="myTable" >
  <tr>
 <th align='left'><b>pid</b></th>  
 <th align='left'><b>title</b></th> 
 <th align='left'><b>started</b></th>         
 <th align='left'><b>ended</b></th>        
 <th align='left'><b>phase</b></th> 
 <th align='left'><b>description</b></th>    
 <th align='left'><b>userid</b></th>  
</tr>
    <?php
    
        while  ($row =  $rows->fetch())	{
            echo  "<tr>";
            echo  "<td align='left'>" . $row['pid'] . "</td>";
            echo  "<td align='left'>" . $row['title'] . "</td>";
            echo  "<td align='left'>" . $row['start_date'] . "</td>";
            echo  "<td align='left'>" . $row['end_date'] . "</td>";
            echo  "<td align='left'>" . $row['phase'] . "</td>";
            echo  "<td align='left'>" . $row['description'] . "</td>";
            echo "<td align='left'>". $row['uid'] . "</td></tr>\n";
            echo  "</tr>";
        }
        echo  '</table>';
    }
    else {
        echo  "<p>No project in the list.</p>\n"; 
    }
}
catch (PDOexception $ex){
    echo "Sorry but a database error occurred <br>";
    echo "Error details: <em>". $ex->getMessage()."</em>";
}
?>






</body>



</html>


