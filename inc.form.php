<?php
  include 'dbConnections.php';
  $dbConn = getConnection();
    
  //Displaying the data
  function displayData($string){
    global $dbConn;
    $newString = $string;
    $sql = $newString;
    $counter = 0;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th><u>Movie Title</u></th>";
    echo "<th><u>Genre</u></th>";
    echo "<th><u>Year Released</u></th>";
    echo "<th><u>Add to Cart</u></th>";
    echo "</tr>";
    foreach($records as $record){
      $counter = $record['movie_id'];
      echo"<tr>";
      echo "<td>" . $record['movie_title'] . "</td>";
      echo "<td>" . $record['movie_category'] . "</td>";
      echo "<td>" . $record['release_year'] . "</td>";
      echo "<td><input type='checkbox' name='cart' value'$counter'/>$counter</td> ";
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
=======
      $filter = $_GET['filter'];
      $temp = "";
      $filterStatus = false;
      
      if(!empty($_GET['filter'])){
        $filterStatus = true;
      }
      else{
        $filterStatus = false;
      }
      
      if ($filterStatus == true){
        if ($filter == 'title'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id
                   FROM movie
                   ORDER BY movie_title DESC";
          displayData($temp);
        }
        else if($filter == 'genre'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id
                   FROM movie
                   ORDER BY movie_category DESC";
          displayData($temp);
        }
        else if($filter == 'year'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id
                   FROM movie
                   ORDER BY release_year DESC";
          displayData($temp);
        }
      }
      
>>>>>>> 0ed028cbb016f696e544c0d2fe39e994e53d084d
    }    
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Movie Search Engine</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Fascinate+Inline" rel="stylesheet">
</head>
<body>
  <div id="wrapper">
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
      
      Filter by Type:
      <input type="radio" name="filter" value="title" /> Movie Title
      <input type="radio" name="filter" value="genre" /> Genre
      <input type="radio" name="filter" value="year" /> Year Released
      
      <input type="submit" value="Go" name="submit" />
    </form>
    <?php
    //displayData("SELECT * FROM `movie` WHERE 1");
    submit();
    //displayData();
    ?>
  </div>
</body>
</html>