<?php
function getConnection(){
    
    $host = 'localhost';
    $dbname = 'blockbuster';
    $username = 'tinoco86';
    $password = 'cstmyphp336';
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}
?>

