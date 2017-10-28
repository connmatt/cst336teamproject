<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8" />
        <title>Shopping Cart</title>
        <style>
        </style>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Fascinate+Inline" rel="stylesheet">
    </head>
     <h1>Movie Search Engine</h1>
    <body>
       
        <?php
    
            $dbHost = getenv('IP');
            $dbPort = 3306;
            $dbName = "blockbuster";
            $username = 'root';
            $password = "";
            
            $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
     
           
            echo "Movies: <br/ >";
            $sql = "SELECT movie_title FROM `movie`";
            		
            		
            $stmt = $dbConn->query($sql);	
            $results = $stmt->fetchAll();
            foreach ($results as $record) {
            	echo $record['movie_title'];
            	echo "<br />";
            	
            }
            
?>
//stylesheet
head,html{
    
    color:white;
    top:10px;
    font-size: 25px;
    padding-top: 3%;
    padding-bottom: 6%;
    padding-left: 40px;
    left:100px;
    
}
h1{
    
    font-family: 'Fascinate Inline', cursive;
}
body{
    background-image: url("../css/cinema.jpg");
    position: absolute;
    color: white;
    left: 600px;
    top: 90px;
    font-size: 19px;
}

div.movies{
    color: white;
    position:absolute;
    
}