<<<<<<< HEAD

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
=======
>>>>>>> 215d8f83f9626392f1dd90bf3afe030528bbc783
