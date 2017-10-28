<?php
function getConnection(){
    
<<<<<<< HEAD
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "blockbuster";
    $username = 'root';
    $password = "";
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName", $username, $password);
=======
    $host = 'localhost';
    $dbname = 'blockbuster';
    $username = 'tinoco86';
    $password = 'cstmyphp336';
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
>>>>>>> 0262c1b61da6178a965dce87d413e82d6215d845
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}
<<<<<<< HEAD
?>
=======
?>

>>>>>>> 0262c1b61da6178a965dce87d413e82d6215d845
