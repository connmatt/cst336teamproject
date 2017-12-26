<?php
function getConnection(){
    
    $host = "localhost";//cloud 9
    $dbname = "blockbuster";
    $username = "web_user";
    $password = "s3cr3t";
    
    //using different database variables in Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $dbHost = getenv('DATABASE_HOST');
        $dbPort = getenv('DATABASE_HOST');
        $dbName = getenv('DATABASE_NAME');
        $username = getenv('USERNAME');
        $password = getenv('PASSWORD');
   } 
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
    
}
?>