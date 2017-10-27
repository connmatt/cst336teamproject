<html>
    <head>
        <meta charset="utf-8" />
        <title>Shopping Cart</title>
        <style>
        </style>
        <link href="styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
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
