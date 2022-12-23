<?php
require_once("config.php");
require_once("add_art.php");

// function redirect($url) {
//   header('Location: '.$url);
//   die();
// }


if(isset($_POST['add_artist'])){
    $birthplace = $_POST['birthplace'];
    $age = $_POST['age'];
    $style = $_POST['style'];
    
    $msg=mysql_query($con,"INSERT INTO artist (artist_name, birthplace, age, style) VALUES ('$artist_name', '$birthplace', '$age', '$style');
    INSERT INTO art (title, year, type, price, artist_name) VALUES ('$title','$year', '$type', '$price','$artist_name')");
    if($msg){
      echo "<script>alert('Added Sussessfully');</script>";
      redirect('index.php');
    }
  }else{
    echo "<script>alert('Author error.');</script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="bootstrap.css">
<title>HOME</title>
</head>
<body>
<div class="topnav">
<h2>Add Artist: $artist_name</h2>
            <form  method='post' name='add_artist' onsubmit='return true'>
              <div class='form-floating mb-12'>
                <input type='text' name='birthplace' class='form-control' id='floatingInput' >
                <label for='floatingInput'>Birthplace</label>
              </div>
              <div class='form-floating mb-12'>
                <input type='number' name='age' class='form-control' id='floatingInput' >
                <label for='floatingPassword'>Age</label>
              </div>
              <div class='form-floating mb-12'>
                <input type='text' name='style' class='form-control' id='floatingInput'>
                <label for='floatingPassword'>Style</label>
              </div>
              <button type='submit' class='btn btn-primary' name='add_artist'>Add</button>
            </form>
</div>
</div>
</body>
</html>