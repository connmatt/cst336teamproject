<?php

include 'dbconnection.php';

$dbConn = getConnection();

function getFormats(){
  global $dbConn;
  $sql = "SELECT DISTINCT(format_type)
          FROM `formats`
          ORDER BY format_type";
          
  $stmt = $dbConn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($records as $record){
    echo "<option>" . $record['format_type'] . "</option>";
  }
}


function getGenre(){
  global $dbConn;
  $sql = "SELECT DISTINCT(movie_category)
          FROM `movie`
          ORDER BY movie_category";
          
  $stmt = $dbConn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($records as $record){
    echo "<option>" . $record['movie_category'] . "</option>";
  }
}



function displayData(){
  global $dbConn;
  
  $sql = "SELECT * FROM `movie` WHERE 1";
  
  $stmt = $dbConn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($records as $record){
    echo $record['movie_title'] . " ". $record['movie_category'] . " " . $record['release_year'];
    echo "<br />";
    
  }
}
  function submit(){
    global $dbConn;
    if (isset($_GET['submit'])) {
      $movieTitle = $_GET['movieTitle'];
      $celeb = $_GET['genre'];
      $format = $_GET['format'];
      
      if ($format == "Blueray")
      {
        
        $sql = "SELECT movie.movie_title, movie.movie_category, movie.duration
                FROM  `movie` 
                WHERE movie.release_year >=2006
                LIMIT 0 , 30";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
          
           echo $record['movie_title'] . " ". $record['movie_category'];
           echo "<br />";
           
          
        }
      }
      
      // echo "Movie Title: " . $movieTitle . "<br>Celeb Name: " . $celeb . "<br>Type of Format: " . $format . "<br>";
      // echo "IT WORKED!!!";
    }    
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Movie Search Engine</title>
</head>
<body>
  <div>
    <h1>Movie Search Engine</h1>
    <form method='get'>
      <h3>Search through the following methods:</h3>
      
      Movie Title:
      <input type="text" name="movieTitle" placeholder="Movie Title" />
      <br /><br />
      
      Genre:
      <select name="genre">
        <option>Select Genre</option>
        <?=getGenre()?>
      </select>
      <br /><br />
      
      Format Type:
      <select name="format">
        <option> Select Format</option>
        <?=getFormats()?>
      </select>
      <br /><br />
      
      <input type="submit" value="Checkout" name="submit" />
    </form>
    <?php
    submit();
    //displayData();
    ?>
  </div>
</body>
</html>