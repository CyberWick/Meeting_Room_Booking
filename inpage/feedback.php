<?php 
	$db = mysqli_connect('localhost','root','root','test') or die ("cannot connect to db");
	// if(isset($_POST['submit'])) {
		$email = $_REQUEST['email'];
		$fname = $_REQUEST['fname'];
		$feedback = $_REQUEST['feddback'];
		// echo "HEYYY";
		// echo $email;
		$query = "INSERT INTO feedback VALUES('$email', '$fname', '$feedback')";
		if (mysqli_query($db, $query)) {
			    echo "Feedback recorded successfully!";
		} else {
			    echo "Error: " . $query . "<br>" . mysqli_error($db);
		}
	// }
?>