<?php 
    session_start();
    require_once("config.php");
	
	function redirect($url) {
		header('Location: '.$url);
		die();
	}

    if(isset($_POST['signup'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $designation = $_POST['designation'];
        $address = $_POST['address'];
		$password = $_POST['password'];
		$user = $_POST['user'];


        $sql = mysqli_query($con,"select * from $user where name='$name'");
        $row = mysqli_num_rows($sql);
        if($row>0){
            echo "<script>alert('$user already exists');</script>";
        }
        else{
            $msg=mysqli_query($con,"insert into $user(name,email,designation,address,password) values('$name','$email','$designation','$address','$password')");
            if($msg){
                echo "<script>alert('Registered successfully');</script>";
				redirect('index.php');
            }
        }
		
    }



// mysqli_connect("servername","username","password","database_name")

// Get all the categories from category table
$sql = "SELECT * FROM `course`";
$courses = mysqli_query($con,$sql);

// The following code checks if the submit button is clicked
// and inserts the data in the database accordingly
// if(isset($_POST['submit']))
// {
//     // Store the Product name in a "name" variable
//     $name = mysqli_real_escape_string($con,$_POST['Product_name']);
    
//     // Store the Category ID in a "id" variable
//     $id = mysqli_real_escape_string($con,$_POST['Category']);
    
//     // Creating an insert query using SQL syntax and
//     // storing it in a variable.
//     $sql_insert =
//     "INSERT INTO `product`(`product_name`, `category_id`)
//         VALUES ('$name','$id')";
    
//     // The following code attempts to execute the SQL query
//     // if the query executes with no errors
//     // a javascript alert message is displayed
//     // which says the data is inserted successfully
//     if(mysqli_query($con,$sql_insert))
//     {
//         echo '<script>alert("Product added successfully")</script>';
//     }
// }
// ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Signup</title>
</head>
<body>
<form method="POST">
    <div class="form-floating mb-12">
    <label>Select Course</label>
    <select name="Category">
        <?php
            while ($category = mysqli_fetch_array(
                    $courses,MYSQLI_ASSOC)):;
        ?>
            <option value="<?php echo $category["title"];
                // The value we usually set is the primary key
            ?>">
                <?php echo $category["title"];
                    // To show the category name to the user
                ?>
            </option>
        <?php
            endwhile;
            // While loop must be terminated
        ?>
    </select>
    </div>
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
       
        <input type="file" class="form-control" id="myFile" name="filename">
        <label for="filename"> Upload Syllabus</label>
    </div>
    <div class="form-floating mb-12">
      <input type="text" name="pre_req" class="form-control" id="floatingInput">
      <label for="floatingPassword">Pre-requisite</label>
    </div>
    <button type="submit" class="btn btn-primary" name="add_course">Add</button>
  </form> 
    
</body>
</html>
