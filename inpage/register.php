<?php
	session_start();
	$errors = array();
	$db = mysqli_connect('localhost','root','root','test') or die ("cannot connect to db");
	if(isset($_POST['submit'])) {
		$email = $_REQUEST['email'];
		$lname = $_REQUEST['lname'];
		$fname = $_REQUEST['fname'];
		$password = $_REQUEST['password'];
		$gender = $_REQUEST['gender'];
		$age = $_REQUEST['age'];
	
		$user_check_query = "SELECT email FROM Users WHERE email='$email' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);	
		$user = mysqli_fetch_assoc($result);
		// echo $user['email'];
		if($user) {
			array_push($errors,"E-mail already exists!");
			// echo("PUSHED INTO ERRORS");
		}
		else {
			$password = $password;//encrypt the password before saving in the database

  			$query = "INSERT INTO Users VALUES('$email', '$fname', '$lname', '$age', '$gender', '$password')";
  			
  			if (mysqli_query($db, $query)) {
			    echo '<script>alert("New record created successfully");</script>';
			} else {
			    echo "Error: " . $query . "<br>" . mysqli_error($db);
			}
  			$_SESSION['username'] = $fname;
  			$_SESSION['email'] = $email;
  			$_SESSION['success'] = "You are now logged in";
  			header('location: home.php');
		}
	}
?>