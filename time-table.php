<!DOCTYPE html>
<html>
<head>
	<title>Time-Table</title>
  <style type="text/css">
    table {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                    position:absolute;
                    bottom:300px;
                    right:450px;
                }
                table td {
                    border: 1px solid black;
                }
                table td.shrink {
                    white-space:nowrap
                }
                nav{
      background-color: transparent;
     position:absolute;
     right:0px;
     float: right;
     padding: 10px;
    }
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
          <li><a href="#" title="Time-Table">TIME-TABLE</a></li>
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
   <div style="padding-top: 20px;">
   <form name="tdata" onsubmit="return false">
   <label for="days">Choose a meeting room:</label>
    <select id="roomname" name="roomName" style="width: 100px;height: 40px;border-radius: 5px;">
          <?php 
            $db = mysqli_connect('localhost','root','root','test') or die ("cannot connect to db");
            $sql = "select rno,roomName from roomdetails";
            $result = mysqli_query($db, $sql);
            $rows = array();
            while($row = $result->fetch_assoc()) {
                // $rows['room'] = $row;
                $room = $row['roomName'];
                $id = $row['rno'];
                echo '<option value='.$id.'>'.$room.'</option>';
            }
          ?>
    </select><br><br>
          
    <label>Enter Date : </label><input type="date" name="date" id="date" placeholder="Enter Date" required="" title="Date" class="inputcss">
    <input type="submit" title="submit" name="submit" id="submit" style="background: #0055ff;opacity: 05;width: 100px;height: 30px;border-radius: 20px;color: white;" onclick="getTimeTable()">  
    </form>
    <br><br>
    <!-- <%if(request.getParameter("submit")!=null) {
    	out.println("Time-Table for " + request.getParameter("roomName") + " on " + request.getParameter("date"));	
    }%>
    } -->
  <div id="table_place">
      <!-- <table border="1" align="center" style="left: 260px;" id="time-table">
                <caption id="caption" style="color: black;font-size: 22px;font-weight: bold;"><div id="inCaption"></div></caption>
                <tr bgcolor="grey" >
                    <th>9:00-10:00</th>
                    <th>10:00-11:00</th>
                     <th>11:00-12:00</th>
                    <th>12:00-13:00</th>
                    <th>13:00-14:00</th>
                    <th>14:00-15:00</th>
                    <th>15:00-16:00</th>
                    <th>16:00-17:00</th>
                    <th>17:00-18:00</th>
                </tr>
                <tr>
                  <%
                    //out.println("OUT HERE");
                  	if(request.getParameter("submit")!=null) {
                  	//Date date = new SimpleDateFormat("dd/MM/yyyy").parse(request.getParameter("date"));
                    String date1 = request.getParameter("date");//new SimpleDateFormat("yyyy-MM-dd").format(date);
                    String room = request.getParameter("roomName");
                    Class.forName("com.mysql.jdbc.Driver");
                    con = DriverManager.getConnection("jdbc:mysql://localhost:3306/test?characterEncoding=latin1",
                                                        "root","root");
                    st= con.createStatement();
                    rs = st.executeQuery("select startTime,endtime,bookedby from timetable where room='" + room +"' AND date='" + date1 + "'");
                    ArrayList<Integer> sttime = new ArrayList<>();
                    ArrayList<Integer> ndtime = new ArrayList<>();
                    ArrayList<String> bookList = new ArrayList<>();
                    while(rs.next()){
                      sttime.add(rs.getInt(1));
                      ndtime.add(rs.getInt(2));
                      bookList.add(rs.getString(3));
                    }
                    //out.println(sttime.size());
                    String bookedby= "FREE SLOT";
                    int j=0,nowtime=0;int flag=0;
                    for(i=0;i<9 ;i++) {
                      if(sttime.size()>0 && (i+9) == sttime.get(j) ) {
                        flag=1;
                        nowtime = sttime.get(j);
                        bookedby=bookList.get(j);
                      }
                      else if(sttime.size()>0&&flag==1 && (i+9)<ndtime.get(j)) {
                        nowtime = ndtime.get(j);
                      }else if(sttime.size()>0 && flag==1 && (i+9)>ndtime.get(j)) {
                        flag=0;
                        j++;
                        bookedby = "FREE SLOT";
                      }
                  %>
                  <% if (bookedby.equals("FREE SLOT")) { %>
                    <td bgcolor="white"><%=bookedby%></td>
                  <% } else { %>
                    <td bgcolor="yellow"><%=bookedby%></td>
                  <% } %>
                  <c:set var="flag" value="<%=flag%>"/>     
                  <c:set var="num" value="<%=j%>"/>                  <c:set var="bookedby" value="<%=bookedby%>"/>  
                  <c:choose>
                      <c:when test="${flag eq 1}">
                        <td bgcolor="yellow">${bookedby}</td>
                      </c:when>
                      <c:otherwise>
                         <td bgcolor="yellow">${bookedby}</td>
                      </c:otherwise>
                    </c:choose> -->
                  <!-- <%
                    }
                  	}
                  %> 
                </tr>
    </table> -->
    </div>
  </div>
</div>
  
 <br><br>
  <footer style="height: 200px;width: 100%">
     
        <div style="background: black;opacity: 0.7;color: white;display: block;margin-right: auto;margin-left: auto;width: 100%;" align="center">
        &copy; Copyright 2020 MeetingRoom.Inc

        </div>
      
</footer>
<script type="text/javascript">
  function enableSubmit() {
    if(document.getElementById("date").value=="") {
      alert("Fill the date");
      // return false;
    }
    else {
      document.getElementById("submit").disabled = false;
      // return true;
    }
  }
  function getTimeTable() {

    var room = document.forms["tdata"]["roomName"].value;
    var date1 = document.forms["tdata"]["date"].value;
    // alert(room + "   " + date1);
    var xHttp = new XMLHttpRequest();
    xHttp.onreadystatechange = function () {
      if(this.readyState == 4 && this.status == 200) {
        // alert(this.responseText);
        document.getElementById("table_place").innerHTML = this.responseText;
      }else {
        // alert(this.readyState+ "   " + this.status);
      }
    };
    xHttp.open("GET", "inpage/getTimetable.php?roomName=" + room + "&date=" + date1 + "&submit=submit", true);
    // xHttp.onreadystatechange = processRequest();
    xHttp.send();
    
    // alert(xHttp);
  }
</script>
</body>
</html>
