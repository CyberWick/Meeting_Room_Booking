 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["check"]))
{
$date1 = $_POST["date"];
$time1 = $_POST["stime"];
$time2 = $_POST["etime"];
$cap1 = $_POST["capacity"];
$type1 = $_POST["rooms"];

$str_arr=(explode(":",$time1));
$time1= $str_arr[0]; 
$str_arr=(explode(":",$time2));
$time2= $str_arr[0]; 
$tdiff = $time2-$time1;


if($tdiff>1)
{
echo "<script> alert('Please select one hour slots') </script>";
}
else
{
$sql1 = "SELECT rno,roomName FROM RoomDetails WHERE capacity >= '$cap1' and type = '$type1'";
$result1 = $conn->query($sql1);
$flag=0;
if ($result1) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
    $roomf = $row["roomName"];
    $roomid = $row['rno'];   
    // echo $roomf.' '.$roomid;
    $sql2 = "SELECT * FROM timetable WHERE room='$roomf' and startTime='$time1' and endtime='$time2' and date1='$date1'";
    $result2 = mysqli_query($conn, $sql2); 
    $user = mysqli_fetch_assoc($result2);
    if(is_null($user))
    {
     
    $sql3 = "INSERT INTO timetable VALUES(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql3);
    // echo $_SESSION['username']. '  '.$_SESSION['email'];
    $stmt->bind_param("sssssss", $roomf, $_SESSION['username'],$time1, $time2, $date1, $roomid, $_SESSION['email']);
    $stmt->execute();
    $flag=1;
    //echo $row["rno"]. " booked!";
    echo "<script> alert ('$roomf booked!') </script>";
    break;
  }
    }
  if($flag!=1)
  {
    echo "<script> alert('No room available') </script>";
  }
  
} 
else 
{
    echo "<script> alert('No such room available') </script>";
}
}

}
$conn->close();
?> 
<html>
<head>
  <link rel="stylesheet" href="signup.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body class="bgImage">
 
<header style="height: 100px;background-color: transparent;">
 

 
      <nav id="nav">
        <li> <a href="https://www.mysite.com" title="Mysite"><img src="mylogo.png" width="60" height="70" alt="My Logo" style="float: left;position: absolute;left: -10px;"></a></li> 
        <ul id="navigation">
         
          <li><a href="home.php" title="Home">HOME</a></li>
          <li><a href="aboutus.php" title="About Us">ABOUT US</a></li>
          <li><a href="#" title="Book">BOOK</a></li>
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
<div style="width: 800px;height: 550px;display: block;margin-right: auto;margin-left: auto;" align="center">
<form name="login" action="Book.php" method="post" style="height: 400px;" class = "signupbox">
        <label style="color: black;font-size: 22px;font-weight: bold;">BOOK ROOM</label>
        <br><br>
        <div style="color: black"  align="center">
<label for="date">Enter date:</label>
         <input type="date" name="date" id="date" placeholder="Enter date" required="" title="date" class="inputcss" onchange="checkDate()"><br><br>
<label for="stime">Enter start time:</label>

<input type="time" name="stime" min="09:00" max="17:00"placeholder="Enter start time" required="" class="inputcss"> <br><br>
<label for="etime">Enter end time:</label>
<input type="time" name="etime" min="09:00" max="17:00"placeholder="Enter end time" required="" class="inputcss"> <br><br>
<label for="stime">Enter capacity:</label>
<input type="number" name="capacity" id="number" placeholder="Enter capacity required" required="" class="inputcss"> <br><br>


   
<br>
<br>
<label for="rooms">Select room type:</label>

<select name="rooms">
  <option value="Conference room">Conference room</option>
  <option value="Seminar hall">Seminar hall</option>
  <option value="Auditorium">Auditorium</option>
</select>
<br>
<br>
</body>
<button name="check" type="submit" style="background: #0055ff;opacity: 05;width: 200px;height: 50px;border-radius: 20px;" onclick="validate()"><a style="color: white;text-decoration: none;font-weight: bold;">Check availability</a></button>

</div>

</form>

</div>
</section>
</div>
<!-- <script>
document.getElementById("number").min = "10";
document.getElementById("number").max = "200";

function checkDate(){
    var edate = document.getElementById("date"),
    var curr= new Date(2018,11,24);
    if(edate<curr)
    {
        alert ("Invalid date");
        return false;
    }
}
  </script> -->
 
<script>
// document.getElementById("number").min = "10";
// document.getElementById("number").max = "200";

$(document).ready(function(){
  $("#b1").click(function(){
    $("p").fadeToggle();
   
  });
});
function validate()
  {
    var num;
    num=document.getElementById("number").value;
    if (isNaN(num) || num < 10 || num > 200) {
      alert ("Invalid capacity");
      return false;
    }
   
  }
  function checkDate() {
   var selectedText = document.getElementById('date').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");
   }
 }
 

</script>
 <footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
</body>
</html>