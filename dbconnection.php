<?php
function getConnection(){
    
    $host = "localhost";//cloud 9
    $dbname = "blockbuster";
    $username = "web_user";
    $password = "s3cr3t";
    
    //using different database variables in Heroku
    // if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
    //     $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    //     $host = $url["host"];
    //     $dbname = substr($url["path"], 1);
    //     $username = $url["user"];
    //     $password = $url["pass"];
    // } 
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
    
}
?>