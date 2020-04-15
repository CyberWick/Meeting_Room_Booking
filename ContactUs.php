
<html>
<head>
  <link rel="stylesheet" href="signup.css">
</head>
<body class="bgImage">
<header style="height: 100px;background-color: transparent;">
  
	 
  
      <nav id="nav">
      	<li> <a href="https://www.mysite.com" title="Mysite"><img src="mylogo.png" width="60" height="70" alt="My Logo" style="float: left;position: absolute;left: -10px;"></a></li> 
        <ul id="navigation">
         
          <li><a href="home.php" title="Home">HOME</a></li>
          <li><a href="aboutus.php" title="About Us">ABOUT US</a></li>
            <li><a href="room_filter.html" title="book">BOOK</a></li>
            <li><a href="time-table.php" title="Time-Table">TIME-TABLE</a></li>
        	<!-- <li><a href="rooms.xml" title="Donate">ROOM DETAILS</a></li> -->
         	<!-- <li><a href="login.html" title="Login">SITEMAP</a></li> -->
          <li><a href="#" title="contact us">CONTACT US</a></li>
          <li><?php 
  
                  session_start(); 
   
                  if(isset($_SESSION["username"])){ 
                    echo '<a href="profile.php">Hi, ' . $_SESSION["username"] . '</a>'; 
                  }else {
                    echo '<a href="signup.php">SIGN UP</a>';
                  }  
  
              ?> </li>
        </ul>
      </nav><!-- 
       <input type="text" name="search" placeholder="Search...." title="Search" style="float: right;position: absolute;top: 128px; right: 45px">
     <img src="s.png" alt="Search Logo" title="Search" style="float: right; width:30px; height:30px;position: absolute;top: 128px;right:15px;"> -->
     
</header>
<div>
<section>
	<div style="width: 800px;height: 500px;display: block;margin-right: auto;margin-left: auto;" align="center">
		<form name="login" onsubmit="return false" class = "signupbox">
        <label style="color: black;font-size: 22px;font-weight: bold;">CONTACT US</label>	
        <br><br>
        <div style="color: black"  align="center">
         <input type="text" name="fname" placeholder="Enter fullname" required="" title="fullname" class="inputcss"><br><br>
		 <?php
		 echo '<input type="text" id="email" name="email" placeholder="Enter email id" required="" class="inputcss" value='.$_SESSION['email'].'> <br><br>';
		 ?>
		 
    <textarea id="msg" name="message" placeholder="Write something.." style="height:200px; width:200px;"></textarea>
		 <br>
		 <br>
		 <button style="background: #0055ff;opacity: 05;width: 200px;height: 50px;border-radius: 20px;" onclick="namCheck()"><a style="color: white;text-decoration: none;font-weight: bold;">Submit</a></button>
     <br>
     <!-- <br> -->
     <button type="reset" style="background: #0055ff;opacity: 05;width: 200px;height: 50px;border-radius: 20px;" onclick="namCheck()"><a href="home.php" style="color: white;text-decoration: none;font-weight: bold;">Reset</a></button>
		 
		</div>
			
		</form>
	
	</div>
</section>
</div>
<script type="text/javascript">
  function ValidateEmail() {
      var email = document.forms["login"]["email"].value;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      // alert('IN ValidateEmail');
      if(email.match(mailformat)) {
        // document.forms["SignUp"]["email"].focus();
	      var feddback = document.forms["login"]["message"].value;
        var fname = document.forms["login"]["fname"].value;
        var xHttp = new XMLHttpRequest();
        // alert('MATXHED');
        xHttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200) {
          alert(this.responseText);
          //document.getElementById("table_place").innerHTML = this.responseText;
        }else {
        // alert(this.readyState+ "   " + this.status);
        }
      };
      xHttp.open("GET", "inpage/feedback.php?email=" + email + "&fname=" + fname + "&feddback=" + feddback + "&submit=submit", true);
      xHttp.send();
        return true;
      }else {
        alert("Invalid e-mail address");
        document.forms["login"]["email"].focus();
        return false;
      }


    }

    function namCheck(){
      var nameType= /^[a-zA-z]{2,}$/;
      var name=document.forms["login"]["fname"].value;
      if(name.match(nameType)){
          ValidateEmail();

      }
      else{
        alert("Invalid name");
        return true;
      }
    }
</script>
<br><br><br><br><br>
<footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
      
</footer>
</body>
</html>




 
