<?php
  include 'dbConnections.php';
  $dbConn = getConnection();
    
  //Displaying the data
  function displayData($string){
    global $dbConn;

    $sql = $string;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th><u>Movie Title</u></th>";
    echo "<th><u>Genre</u></th>";
    echo "<th><u>Year Released</u></th>";
    echo "</tr>";
    foreach($records as $record){
      echo"<tr>";
      echo "<td>" . $record['movie_title'] . "</td>";
      echo "<td>" . $record['movie_category'] . "</td>";
      echo "<td>" . $record['release_year'] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }
  
  //Get the type of format
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

  //Get the Genre
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

  //Determine how to display after hitting the submit button
  function submit(){
    global $dbConn;
<<<<<<< HEAD
=======
    
    $sql = "SELECT * FROM device WHERE 1 ";
    
>>>>>>> eab3fcfee824d3af4a88899c8ed66a49a1e27e27
    if (isset($_GET['submit'])) {
      $movieTitle = $_GET['movieTitle'];
      $celeb = $_GET['genre'];
      $format = $_GET['format'];
<<<<<<< HEAD
      
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
=======
    }    
  }
  ?>
>>>>>>> eab3fcfee824d3af4a88899c8ed66a49a1e27e27

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
<<<<<<< HEAD
      <select name="format">
        <option> Select Format</option>
        <?=getFormats()?>
=======
      <select name="format_type">
      <option> Select Format</option>
      <?=getFormats()?>
>>>>>>> eab3fcfee824d3af4a88899c8ed66a49a1e27e27
      </select>
      <br /><br />
      
      <input type="submit" value="Checkout" name="submit" />
    </form>
    <?php
    displayData("SELECT * FROM `movie` WHERE 1");
    submit();
<<<<<<< HEAD
    //displayData();
=======
>>>>>>> eab3fcfee824d3af4a88899c8ed66a49a1e27e27
    ?>
  </div>
</body>
</html>