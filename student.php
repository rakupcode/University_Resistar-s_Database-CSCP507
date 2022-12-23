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
    <label>Course</label>
    <label>select</label>
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
    <br>
    <input type="submit" value="submit" name="submit">
</form>
<br>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Signup</title>
</head>
<body>
    <h2>Research paper submission portal</h2>
    <form  method="post" name="signup" onsubmit="return true">
			<div>
				<label for="signup">You are a</label>
                
				<select name="user">
				<option value="Reviewer">Reviwer</option>
				<option value="Author">Author</option>
				<option value="Guest">Guest</option>
				</select>
			</div>
			<div>
                <label >
                	Name
                </label>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div>
                <label>
                	Email
                </label>
                <input type="text" name="email" placeholder="Enter email" required>
            </div>
			<div>
                <label>
                	Designation
                </label>
                <input type="text" name="designation" placeholder="Enter designation" required>
            </div>
			<div>
                <label>
                	Address
                </label>
                <input type="text" name="address" placeholder="Enter address" required>
            </div>
            <div>
                <label for="password">
                	Password
                </label>
                <input type="text" name="password" placeholder="Enter password" required>
            </div>

            <button type="submit" name="signup">Signup</button> 
    </form>
</body>
</html>