<?php
function getConnection(){
    

    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "blockbuster";
    $username = 'root';
    $password = "";
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName", $username, $password);

    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}


?>


