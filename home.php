<!DOCTYPE html>
<html>
<head>
	<title>Meeting Room Booking</title>
  <style type="text/css">
    .foot{
      background-color: black;
    }
  </style>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body class="bgImage">
	<header style="height: 100px;background-color: transparent;">
  
	 
  
      <nav id="nav">
      	<li> <a href="https://www.mysite.com" title="Mysite"><img src="mylogo.png" width="60" height="70" alt="My Logo" style="float: left;position: absolute;left: -10px;"></a></li> 
        <ul id="navigation">
         
          <li><a href="#" title="Home">HOME</a></li>
          <li><a href="aboutus.php" title="About Us">ABOUT US</a></li>
          <li><a href="book.php" title="Book">BOOK</a></li>
        	<li><a href="time-table.php" title="Time-Table">TIME-TABLE</a></li>
         	<li><a href="ContactUs.php" title="ContactUs">CONTACT US</a></li>
          <li><?php 
  
                  session_start(); 
   
                  if(isset($_SESSION["username"])){ 
                    echo '<a href="profile.php">Hi, ' . $_SESSION["username"] . '</a>'; 
                  }else {
                    echo '<a href="signup.php">SIGN UP</a>';
                  }  
  
              ?> </li>
         	<!-- <li><a href="signup.html" title="Sign Up/Login">SIGN UP</a></li> -->
        </ul>
      </nav>
</header>
  <br>
  <div align="center" style="background-color: white;opacity: 0.9;width: 1100px;height: 400px;display: block;margin-right: auto;margin-left: auto;">

<!--     <fieldset>
  <legend><h1 style="text-align: center; font-size: 35px;">About Us</h1></legend>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.<br><br>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.<br><br>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.</p>
</fieldset>-->
	 <legend><h1 style="text-align: center; font-size: 40px;padding-top: 40px;">Meeting Room Booking</h1></legend>
    <!-- <br> -->
    <p style="font-size: 20px">Let us organise meets for you!<br>Just provide us the details and we'll arrange a meeting room with all your needs satisfied<br>A few simple steps to get your scheduling work done and let you focus on your meeting preparation</p>
  </div>
  
 <br><br>
  <footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
      
</footer>
</body>
</html>
