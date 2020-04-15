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
         
          <li><a href="home.php" title="Home">HOME</a></li>
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
  <div align="center" style="background-color: white;opacity: 0.9;border-radius: 8px; width: 600px;height: 400px;display: block;margin-right: auto;margin-left: auto;">
    <form method="post" name="editData" onsubmit="return false">
    <legend><h1 style="text-align: center; font-size: 30px;">YOUR PROFILE</h1></legend><br><br>   
    <?php 
        $mysqli = new mysqli("localhost", "root", "root", "test");
        if($mysqli->connect_error) {
            exit('Could not connect');
        }
        $sql = "select fname,lname,email,gender,age from users where email=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $_SESSION["email"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fname,$lname,$email,$gender,$age);
        $stmt->fetch();
        $ogender = 'male';
        if($gender=='male')
            $ogender = 'female';
        echo '<table style="border: noborder;">';
        echo '<tr><td><label style="color: black;font-size: 16px;">First Name: </label></td><td><input type="text" name="fname" value='. $fname . ' required="" title="First Name" class="inputcss"></td></tr>';
        echo '<tr><td><label style="color: black;font-size: 16px;">Last Name: </label></td><td><input type="text" name="lname" value='. $lname . ' required="" title="Last Name" class="inputcss"></td></tr>';
        // echo '<tr><td><label style="color: black;font-size: 16px;">E-Mail: </label></td><td><input type="text" name="email" placeholder='. $email . ' required="" title="E-Mail" class="inputcss"></td></tr><br>';
        echo '<tr><td><label style="color: black;font-size: 16px;">Gender: </label></td><td><select id="gender" name="gender" class="inputcss">
                <option value='.$gender.' name = "rgender">'.$gender.'</option>
                <option value='.$ogender.' name= "ogender">'.$ogender.'</option>
            </select></td></tr>';
        echo '<tr><td><label style="color: black;font-size: 16px;">Age: </label></td><td><input type="text" name="age" value='. $age . ' required="" title="Age" class="inputcss"></td></tr>'
        // echo '<tr><td><button style="background: #0055ff;opacity: 05;width: 100px;height: 50px;border-radius: 20px;" onClick='.'location.href="?logout=1"'.'>Edit</button></td><td><button style="background: #0055ff;opacity: 05;width: 100px;height: 50px;border-radius: 20px;" onClick='.'location.href="?logout=1"'.'>Logout</button></td></table>';
        //. $fname . ' ' .$lname.'<br><br>';
    ?>
	   <!-- <legend><h1 style="text-align: center; font-size: 40px;padding-top: 40px;">Meeting Room Booking</h1></legend> -->
        <tr>
            <td><br><button style="background: #0055ff;opacity: 05;width: 100px;height: 50px;color: white;border-radius: 20px;" onclick="EditProfile()">Edit</button></td>
            <td><br>
                <button style="background: red;opacity: 05;color: white;width: 100px;height: 50px;border-radius: 20px;" onclick="LogOut()">Logout</button>
            </td>
        </tr>
    </table>
 </form>
  </div>
  <div id="msg_place"></div>
 <br><br>
  <footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
      
</footer>
</body>
<script type="text/javascript">
    function LogOut() {
        alert('Logging out now');
        var xHttp = new XMLHttpRequest();
            xHttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    // document.getElementById("msg_place").innerHTML = this.responseText;
                    window.location.replace('home.php');
                }else {
                    //aert(this.readyState+ "   " + this.status);
                }
            };
            xHttp.open("GET", "inpage/logout.php", true);
    // xHttp.onreadystatechange = processRequest();
            xHttp.send();
    }
    function EditProfile() {
        // alert('Alert');
        // alert(AgeCheck() + "  " + nameCheck());
        if(AgeCheck() && nameCheck()) {
            var lname = document.forms["editData"]["lname"].value;
            var fname = document.forms["editData"]["fname"].value;
            //alert(fname+ "   " +lname);
            var age = document.forms["editData"]["age"].value;
            var gender = document.forms["editData"]["gender"].value;
            var xHttp = new XMLHttpRequest();
            xHttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    // document.getElementById("msg_place").innerHTML = this.responseText;
                    window.location.reload(false);
                }else {
                    //aert(this.readyState+ "   " + this.status);
                }
            };
            xHttp.open("GET", "editprofile.php?fname=" + fname + "&lname=" + lname +"&age=" + age +"&gender=" + gender + "&submit=submit", true);
    // xHttp.onreadystatechange = processRequest();
            xHttp.send();
        }
    }

    // function Validate() {
        
    //     if(){
    //         return true;
    //     } 
    //     alert("Something went wrong");
    //     return false;
//    }
    function AgeCheck() {
            var inputText = document.forms["editData"]["age"].value;
            if(inputText >= 18){
                return true;
            }else {
                alert("You can't register at this age");
                return false;
            }
        }
    function nameCheck() {
            var nameType = /^[a-zA-z]{2,}$/;    
            var name = document.forms["editData"]["fname"].value;
            var lname = document.forms["editData"]["lname"].value;
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
</script>
</html>
<?php
    // if($_GET['edit']) {fun2();}
    // function fun2() {

    // }
    if($_GET['logout']){fun1();}
    function fun1() {
        echo 'In LogOut';
        session_start();
        session_destroy();
        header('location: home.php');
    }
?>