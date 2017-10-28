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

  //Determine how to display after hitting the submit button
  function submit(){
    global $dbConn;
    
    if (isset($_GET['submit'])) {
      $movieTitle = $_GET['movieTitle'];
      $celeb = $_GET['celeb'];
      $format = $_GET['format'];
      $filter = $_GET['filter'];
      $organize = $_GET['organize'];
      $temp = "";
      $oTemp = "";
      $filterStatus = false;
      
      if(!empty($_GET['filter'])){
        $filterStatus = true;
      }
      else{
        $filterStatus = false;
      }
      if($organize == "asc"){
        $oTemp = "ASC";
      }
      else{
        $oTemp = "DESC";
      }
      
      if ($filterStatus == true){
        if ($filter == 'title'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id
                   FROM movie
                   ORDER BY movie_title " . $oTemp;
          displayData($temp);
        }
        else if($filter == 'genre'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id
                   FROM movie
                   ORDER BY movie_category " . $oTemp;
          displayData($temp);
        }
        else if($filter == 'year'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id
                   FROM movie
                   ORDER BY release_year " . $oTemp;
          displayData($temp);
        }
      }
      
    }    
  }
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Movie Search Engine</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="wrapper">
    <h1>Movie Search Engine</h1>
    <form method='get'>
      <h3>Filter through the following methods:</h3>
      
      Filter by Type:
      <input type="radio" name="filter" value="title" /> Movie Title
      <input type="radio" name="filter" value="genre" /> Genre
      <input type="radio" name="filter" value="year" /> Year Released
      <br>
      
      Organize By:
      <select name="organize">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
      </select>
      
      <input type="submit" value="Go" name="submit" />
    </form>
    <?php
    //displayData("SELECT * FROM `movie` WHERE 1");
    submit();
    ?>
  </div>
</body>
</html>