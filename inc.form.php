<?php
  include 'dbconnections.php';
  session_start();
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
    echo "<th><u>Actor</u></th>";
    echo "<th><u>Genre</u></th>";
    echo "<th><u>Year Released</u></th>";
    echo "<th><u>Add to Cart</u></th>";
    echo "</tr>";
    foreach($records as $record){
      $counter = $record['movie_id'];
      echo"<tr>";
      //echo "<td>" . $record['movie_title'] . "</td>";
      if ($record['movie_title'] == "Get Out")
      {
        echo "<td><a href='http://www.imdb.com/title/tt5052448/'>Get Out</a></td></td>"; 
      }
      if ($record['movie_title'] == "The Fault in Our Stars")
      {
        echo "<td><a href='http://www.imdb.com/title/tt2582846/'>The Fault in Our Stars</a></td></td>"; 
      }
      if ($record['movie_title'] == "Avatar")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0499549/'>Avatar</a></td></td>"; 
      }
      if ($record['movie_title'] == "Deadpool")
      {
        echo "<td><a href='http://www.imdb.com/title/tt1431045/'>Deadpool</a></td></td>"; 
      }
      if ($record['movie_title'] == "Batman")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0096895/'>Batman</a></td></td>"; 
      }
      if ($record['movie_title'] == "The Notebook")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0332280/'>The Notebook</a></td></td>"; 
      }
      if ($record['movie_title'] == "Spider Man Homecoming")
      {
        echo "<td><a href='http://www.imdb.com/title/tt2250912/'>Spider Man Homecoming</a></td></td>"; 
      }
      if ($record['movie_title'] == "Euro Trip")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0356150/'>Euro Trip</a></td></td>"; 
      }
      if ($record['movie_title'] == "The Nightmare Before Christmas")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0107688/'>The Nightmare Before Christmas</a></td></td>"; 
      }
      if ($record['movie_title'] == "Halloween")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0077651/?ref_=nv_sr_3'>Halloween</a></td></td>"; 
      }
      if ($record['movie_title'] == "Alien")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0078748/'>Alien</a></td></td>"; 
      }
      if ($record['movie_title'] == "Pacific Rim")
      {
        echo "<td><a href='http://www.imdb.com/title/tt1663662/?ref_=nv_sr_2'>Pacific Rim</a></td></td>"; 
      }
      if ($record['movie_title'] == "The Hangover")
      {
        echo "<td><a href='http://www.imdb.com/title/tt1119646/'>The Hangover</a></td></td>"; 
      }
      if ($record['movie_title'] == "Friday")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0113118/?ref_=fn_al_tt_1'>Friday</a></td></td>"; 
      }
      if ($record['movie_title'] == "The Equalizer")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0455944/?ref_=nv_sr_2'>The Equalizer</a></td></td>"; 
      }
      if ($record['movie_title'] == "Inception")
      {
        echo "<td><a href='http://www.imdb.com/title/tt1375666/?ref_=nv_sr_1'>Inception</a></td></td>"; 
      }
      if ($record['movie_title'] == "John Wick")
      {
        echo "<td><a href='http://www.imdb.com/title/tt2911666/'>John Wick</a></td></td>"; 
      }
      if ($record['movie_title'] == "Kindergarten Cop")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0099938/'>Kindergarten Cop</a></td></td>"; 
      }
      if ($record['movie_title'] == "In the Blood")
      {
        echo "<td><a href='http://www.imdb.com/title/tt2101570/'>In the Blood</a></td></td>";
      }
      if ($record['movie_title'] == "A Walk to Remember")
      {
        echo "<td><a href='http://www.imdb.com/title/tt0281358/'>A Walk to Remember</a></td></td>";
      }
      echo "<td>" . $record['firstName'] . " " . $record['lastName'] ."</td>";
      echo "<td>" . $record['movie_category'] . "</td>";
      echo "<td>" . $record['release_year'] . "</td>";
      echo "<td><input type='checkbox' name='add' value='$counter'>ADD</td>$counter";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    getCart();
  }
  
  function getCart(){
    if(isset($_GET['addToCart'])){
      $addList = array();
      $value = $_GET['add'];
      
      for($i = 1; $i <= 20; $i++){
        if(empty($_GET['add'])){
          continue;
        }
        else{
          if($value == $i){
           array_push($addList, $value); 
          }
        }
      }
      for($i = 0; $i < count($addList); $i++){
        echo $addList[$i];
      }
      
      //$_SESSION['cart'] = $addList;
    }
  }

  //Determine how to display after hitting the submit button
  function submit(){
    global $dbConn;
    
    if (isset($_GET['submit'])) {
      $movieTitle = $_GET['movieTitle'];
      $celeb = $_GET['genre'];
      $format = $_GET['format'];
      $filter = $_GET['filter'];
      $organize = $_GET['organize'];
      $actor = $_GET['actor'];
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
          $temp = "SELECT movie_title, movie_category, release_year, movie_id, firstName, lastName
                   FROM movie, celebrity
                   WHERE movie.movie_id=celebrity.celeb_id
                   ORDER BY movie_title " . $oTemp;
          displayData($temp);
        }
        else if($filter == 'actor'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id, celebrity.firstName, celebrity.lastName
                   FROM movie, celebrity
                   WHERE movie.movie_id=celebrity.celeb_id
                   ORDER BY firstName " . $oTemp;
          displayData($temp);
        }
        else if($filter == 'genre'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id, firstName, lastName
                   FROM movie, celebrity
                   WHERE movie.movie_id=celebrity.celeb_id
                   ORDER BY movie_category " . $oTemp;
          displayData($temp);
        }
        else if($filter == 'year'){
          $temp = "SELECT movie_title, movie_category, release_year, movie_id, firstName, lastName
                   FROM movie, celebrity
                   WHERE movie.movie_id=celebrity.celeb_id
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
  <link href="https://fonts.googleapis.com/css?family=Fascinate+Inline" rel="stylesheet">
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
      <input type="radio" name="filter" value="actor" /> Actor
      <br>
      
      Organize By:
      <select name="organize">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
      </select>
      
      <input type="submit" value="Go" name="submit" />
      To view Shopping Cart:
      <input type="submit" value="Click Here" name="addToCart"/>
    </form>
    <?php
    //displayData("SELECT * FROM `movie`, `celebrity` WHERE movie.movie_id=celebrity.celeb_id");
    submit();
    //displayData();
    ?>
  </div>
</body>
</html>