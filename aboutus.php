<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
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
         
         <li><a href="home.php" title="Home">HOME</a></li>
          <li><a href="#" title="About Us">ABOUT US</a></li>
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
        </ul>
      </nav>
</header>
  <br>
  <div align="center" style="background-color: white;opacity: 0.9;width: 1100px;height: 400px;display: block;margin-right: auto;margin-left: auto;">
    <fieldset>
  <legend><h1 style="text-align: center; font-size: 35px;">About Us</h1></legend>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.<br><br>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.<br><br>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies interdum egestas. Cras placerat lacinia vulputate. Curabitur mattis diam ac est volutpat laoreet.</p>
</fieldset>
  </div>
  <br><br>
  <footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
      
</footer>
</body>
</html>
