<?php
  include 'dbConnections.php';

  $dbConn = getConnection();

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
    
    $sql = "SELECT * FROM device WHERE 1 ";
    
    if (isset($_GET['submit'])) {
      $movieTitle = $_GET['movieTitle'];
      $celeb = $_GET['celeb'];
      $format = $_GET['format'];
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
      
      Celebrity:
      <select name="celeb">
        <option value="all">All</option>
        <option value="1">Celeb 1</option>
        <option value="2">Celeb 2</option>
        <option value="3">Celeb 3</option>
        <option value="4">Celeb 4</option>
      </select>
      <br /><br />
      
      Format Type:
      <input type="radio" name="format" value="any"> Any
      <input type="radio" name="format" value="bRay"> Blue Ray
      <input type="radio" name="format" value="digital"> Digital
      <br /><br />
      
      <input type="submit" value="Checkout" name="submit" />
    </form>
    <?php
    submit();
    displayData();
    ?>
  </div>
</body>
</html>