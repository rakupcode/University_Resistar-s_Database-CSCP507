<?php
session_start();
require_once("config.php");

function redirect($url) {
  header('Location: '.$url);
  die();
}


if(isset($_POST['add_art'])){
  $title = $_POST['title'];
  $year = $_POST['year'];
  $type = $_POST['type'];
  $price = $_POST['price'];
  $artist_name = $_POST['artist_name'];


  $sql = mysqli_query($con,"select * from artist where artist_name='$artist_name'");
  $row = mysqli_num_rows($sql);
  if(!$row){
      echo "<script>alert('Aritst does not exist. Add author first.');</script>";
      redirect('add_auth.php');
            
  }
  else{
      $msg=mysqli_query($con,"INSERT INTO art (title, year, type, price, artist_name) VALUES ('$title','$year', '$type', '$price','$artist_name')");
      if($msg){
        echo "<script>alert('Added Sussessfully');</script>";
        redirect('index.php');
      }
  }

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
  <h2>Add Art</h2>
  <form  method="post" name="add_art" onsubmit="return true">
    <div class="form-floating mb-12">
      <input type="text" name="title" class="form-control" id="floatingInput" >
      <label for="floatingInput">Title</label>
    </div>
    <div class="form-floating mb-12">
      <input type="number" name="year" class="form-control" id="floatingInput" >
      <label for="floatingPassword">Year</label>
    </div>
    <div class="form-floating mb-12">
      <input type="text" name="type" class="form-control" id="floatingInput" >
      <label for="floatingPassword">Type</label>
    </div>
    <div class="form-floating mb-12">
      <input type="number" name="price" class="form-control" id="floatingInput" >
      <label for="floatingPassword">Price</label>
    </div>
    <div class="form-floating mb-12">
      <input type="text" name="artist_name" class="form-control" id="floatingInput">
      <label for="floatingPassword">Name of artist</label>
    </div>
    <button type="submit" class="btn btn-primary" name="add_art">Add</button>
  </form>
</div>
</div>
</body>
</html>