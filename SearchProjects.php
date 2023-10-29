<?php

$db_host = '';
$db_name = '';
$username = '';
$password = '';

try {

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 


require_once ('connectdb.php');

$search = $_POST['search'];
$look = $db->prepare("SELECT * FROM projects WHERE title = ?");
$look->execute([$search]);
$results = $look->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $result){
    echo $result['title']." ".$result['pid']."<br>";
}

} catch(PDOException $ex) {
echo "There is an Error which is" . $ex->getMessage();
}

?>

<!DOCTYPE html>
<html lang = "en">


    <head>

</head>
<body>


    <?php

if (count($results) > 0) {
    foreach($results as $result) {
        echo $result['title'] . "<br>"; 
        echo "Your Project Id is";
        echo $result['pid'] . "<br>";
    }
} else {
    echo "No results found.";
}

?>
<p>Go back? <a href="ViewProjects.php"> View Projects page </a>  </p>


</body>

</html>


