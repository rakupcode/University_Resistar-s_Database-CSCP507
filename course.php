<?php
?>

<?php
session_start();
require_once("config.php");

// function redirect($url) {
//   header('Location: '.$url);
//   die();
// }


if(isset($_POST['add_course'])){
  $title = $_POST['title'];
  $credits = $_POST['credits'];
  $syllabus = $_POST['filename'];
  $pre_req = $_POST['pre_req'];


  $sql = mysqli_query($con,"select * from course where title='$title'");
  $row = mysqli_num_rows($sql);
  if($row>0){
      echo "<script>alert('Course already exists.');</script>";
    //   redirect('course.php');
            
  }
  else{
      $msg=mysqli_query($con,"INSERT INTO course (title, pre_req, syllabus, credits) VALUES ('$title', '$pre_req', '$syllabus', '$credits')");
      if($msg){
        echo "<script>alert('Added Sussessfully');</script>";
        // redirect('course.php');
      }
      else{
        echo "<script>alert('ERROR');</script>";
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
  <h2>Add Course</h2>
  <form  method="post" name="add_course" onsubmit="return true">
    <div class="form-floating mb-12">
      <input type="text" name="title" class="form-control" id="floatingInput" >
      <label for="floatingInput">Course Title</label>
    </div>
    <div class="form-floating mb-12">
      <input type="number" name="credits" class="form-control" id="floatingInput" >
      <label for="floatingPassword">Credits</label>
    </div>
    <div class="form-floating mb-12">
       
        <input type="file" id="myFile" name="filename">
        <label for="filename"> Upload Syllabus</label>
    </div>
    <div class="form-floating mb-12">
      <input type="text" name="pre_req" class="form-control" id="floatingInput">
      <label for="floatingPassword">Pre-requisite</label>
    </div>
    <button type="submit" class="btn btn-primary" name="add_course">Add</button>
  </form>
</div>
</div>
</body>
</html>