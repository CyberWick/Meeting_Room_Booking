<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit1"]))
{
$myuname = $_POST["username"];
$mypwd = $_POST["password"];
echo $myuname.' '.$mypwd;
$sql = "SELECT * FROM users WHERE email = '$myuname' and passwrd = '$mypwd'";
$result = $conn->query($sql);
//echo  $result;
if ($result) {
	$_SESSION['email'] = $myuname;
	$_SESSION['success'] = "You are now logged in";
	$sql1 = "SELECT fname FROM users WHERE email = '$myuname' and passwrd = '$mypwd'";
	$result1 = mysqli_query($conn, $sql1);	
	$user = mysqli_fetch_assoc($result1);
	echo $user['fname'];
	$_SESSION['username'] = $user['fname'];
// echo $user['email'];
	echo "<script> alert('Login successful') </script>";
}
else{
	echo "<script> alert('Login unsuccessful') </script>";
}
if($result) {
	header("location: home.php");
}
}
?>

<html>
<head>
  <link rel="stylesheet" href="styles_login.css">
  <script src="login.js"></script>
</head>

<body class="bgImage" style="background-image: url('meeting_room_bg.png');height: 100%;
   	background-position: center;
  	background-repeat: no-repeat;
  	background-size: cover;">
	
<header style="height: 100px;background-color: transparent;">
  
	 
  <nav id="nav">
      <li> <a href="https://www.mysite.com" title="Mysite"><img src="mylogo.png" width="60" height="70" alt="My Logo" style="float: left;position: absolute;left: -10px;"></a></li> 
        <ul id="navigation">
         
          <li><a href="home.php" title="Home">HOME</a></li>
          <li><a href="aboutus.php" title="About Us">ABOUT US</a></li>
          <li><a href="book.php" title="Book">BOOK</a></li>
        	<li><a href="time-table.php" title="Time-Table">TIME-TABLE</a></li>
         	<li><a href="ContactUs.php" title="ContactUs">CONTACT US</a></li>
          <li><?php 
  
                  // session_start(); 
   
                  if(isset($_SESSION["username"])){ 
                    echo '<a href="profile.php">Hi, ' . $_SESSION["username"] . '</a>'; 
                  }else {
                    echo '<a href="signup.php">SIGN UP</a>';
                  }  
  
              ?> </li>
         	<!-- <li><a href="signup.html" title="Sign Up/Login">SIGN UP</a></li> -->
        </ul>
      </nav><!-- 
       <input type="text" name="search" placeholder="Search...." title="Search" style="float: right;position: absolute;top: 128px; right: 45px">
     <img src="s.png" alt="Search Logo" title="Search" style="float: right; width:30px; height:30px;position: absolute;top: 128px;right:15px;"> -->
     
</header>
<div>
<section>
	<div style="width: 600px;height: 450px;display: block;margin-right: auto;margin-left: auto;" align="center">
		<form name="login" class = "loginbox" action="" method="post">
        <label style="color: black;font-size: 22px;font-weight: bold;">LOGIN</label>	
        <br><br>
        <div style="color: black"  align="center">
         <input type="email" id="username" placeholder="Enter username" required="" name="username" class="inputcss"><br><br>
		 
		 <input type="password" id="password" name="password" placeholder="Enter Password" required="" class="inputcss" > <br><br>
		 
		 <input type="checkbox" name="terms" style="font-size: 3px; float:left;"><a style="float:left;">Remember password</a>
		
		 <label class="psw"><a href="#">Forgot password?</a></label>
		 
		 <br>
		 
		 <br>
		 <br>
		 <button id="submit" name="submit1" style="background: #0055ff;opacity: 05;width: 200px;height: 50px;border-radius: 20px;" ><a style="color: white;text-decoration: none;font-weight: bold;" >Sign In</a></button>
		 <button type="reset" style="background:red;opacity: 05;width: 200px;height: 50px;border-radius: 20px;">Cancel</button>
		 <br>
		 <br>
		  <label style="float:left;"><a href="signup.php">New user?</a></label>
		  <!-- <h1 id="h1">hello</h1>
		  <h2 id="h2">hi</h2> -->
		</div>
			
		</form>
	
	</div>
<br><br><br><br>
</section>
<footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
      
</footer>
</div>
</body>

</html>