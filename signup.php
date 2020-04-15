<?php include('inpage/register.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body class="bgImage">
	<header style="height: 100px;background-color: transparent;">
  
	 
  
      <nav id="nav">
      	<li> <a href="https://www.mysite.com" title="Mysite"><img src="mylogo.png" width="60" height="70" alt="My Logo" style="float: left;position: absolute;left: -10px;"></a></li> 
        <ul id="navigation">
         
          <li><a href="home.php" title="Home">HOME</a></li>
          <li><a href="aboutus.php" title="About Us">ABOUT US</a></li>
            <li><a href="book.php" title="Book">BOOK</a></li>
        	<<li><a href="time-table.php" title="Time-Table">TIME-TABLE</a></li>
        	<li><a href="ContactUs.php" title="ContactUs">CONTACT US</a></li>
         	<li><a href="#" title="Sign Up">SIGN UP</a></li>
        </ul>
      </nav>
     
</header>
<div>
<section>
	<div style="width: 800px;height: 550px;display: block;margin-right: auto;margin-left: auto;" align="center">
		<form name="SignUp" class = "signupbox" action="signup.php" method="post">
        <label style="color: black;font-size: 22px;font-weight: bold;">CREATE ACCOUNT</label>	
        <br><br>
        <?php include('inpage/errors.php') ?>	
        <div style="color: black"  align="center">
        <!-- <input type="text" name="email" placeholder="Enter Email" required="" class="inputcss"> <br><br>
         --> 
        	<input type="text" name="fname" placeholder="Enter First Name" required="" title="First Name" class="inputcss"><br><br>
			<input type="text" name="lname" placeholder="Enter Last Name" required="" title="Last Name" class="inputcss"><br><br>
			<input type="number" name="age" placeholder="Enter Age" class="inputcss"><br><br>
			<div>
			<label>Gender:</label> 
			<select id="gender" name="gender">
  				<option value="male" name = "mgender">Male</option>
  				<option value="female" name= "fgender">Female</option>
  			</select>
			</div><br>
			<input type="text" name="email" placeholder="Enter Email" required="" class="inputcss"><br><br>
			<input type="password" name="password" placeholder="Enter Password" required="" class="inputcss"> <br><br>
			<input type="password" name="confpass" placeholder="Confirm Password" required="" class="inputcss"> <br><br>
			<input type="checkbox" name="terms" id ="tncbox" style="font-size: 6px;" onchange="enableButton()">I agree to all statements of <a href="terms.html">Terms of Service</a>
			<div id="tncmsg" style="color: red;font-size: 13px"><p>*Please tick the box to signup</p></div>
			 <button disabled="true" id="clickMe" style="background: #0055ff;opacity: 05;width: 200px;height: 50px;border-radius: 20px;" onclick="return Validate()" name="submit"><a style="color: white;text-decoration: none;font-weight: bold;" >Sign Up</a></button>
		</div>
		<button type="reset" class="butclass" style="font-size: 15px;background: transparent;border-radius: 20px;border: none;color: #0055ff;">Reset<br>
		<a href="Login.php">Already have an account?</a>
		</form>
	</div>
	
</section>
<script>
		function enableButton() {
			document.getElementById("clickMe").disabled = !tncbox.checked;
			if(document.getElementById("clickMe").disabled == false) {
				$(document).ready(function(){
					$("#tncmsg").hide(500);
				});
			} else {
				$(document).ready(function(){
					$("#tncmsg").show();
				});
			}
		}
		function nameCheck() {
			var nameType = /^[a-zA-z]{2,}$/;	
			var name = document.forms["SignUp"]["fname"].value;
			var lname = document.forms["SignUp"]["lname"].value;
			if(name.match(nameType)) {

			}else {
				alert("Should be 2 characters long and contain only [a-zA-Z]");
				return false;
			}
			if(lname.match(nameType)) {
				return true;	
			}else {
				alert("Should be 2 characters long and contain only [a-zA-Z]");
				return false;
			}
		}
		function Validate() {
			// if(!(document.forms["SignUp"]["mgender"].checked || document.forms["SignUp"]["fgender"].checked)){
			// 	alert("Select a gender");
			// 	return false;	
			// }
			if( nameCheck() && AgeCheck() && ValidateEmail() && PasswordCheck()) {
				// alert("Signup Successful");
				// window.location = "home.html";
				return true; 
			}else {
				alert("Signup failed");
				//window.history.back();
				return false;
			}
		}
		function AgeCheck() {
			var inputText = document.forms["SignUp"]["age"].value;
			if(inputText >= 18){
				return true;
			}else {
				alert("You can't register at this age");
				return false;
			}
		}
		function PasswordCheck() {
			//alert("Hwllow woeld");
			var inputText = document.forms["SignUp"]["password"].value;
			var passwordFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			//alert(inputText.match(passwordFormat));
			if(inputText.match(passwordFormat)) {
				//document.forms["SignUp"]["password"].focus();
				if(inputText == document.forms["SignUp"]["confpass"].value){
					return true;	
				}else {
					alert("Passwords don't match");
					return false;
				}
				
			}else {
				alert("Invalid password (Must contain a Uppercase letter, lowercase letter, a numeric digit and a special character(!@#$%^&*)");
				document.forms["SignUp"]["email"].focus();
				return false;
			}
		}
    	function ValidateEmail() {
			var inputText = document.forms["SignUp"]["email"].value;
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(inputText.match(mailformat)) {
				// document.forms["SignUp"]["email"].focus();
				return true;
			}else {
				alert("Invalid e-mail address");
				document.forms["SignUp"]["email"].focus();
				return false;
			}
		}
	</script> 
<!-- <p id="demo" style="color: black">Hey</p> -->
</div>
<br><br>
<footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>   
</body>
</html>
