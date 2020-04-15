<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
	<head>
		<title>Time-Table</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
			table {
                    border: 1px solid black;
                    border-collapse: collapse;
                    width:50%;
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
    nav li 
    {
     display:block;/*removes bullet*/
     line-height: 50px;
    }
    li a
    {
     text-decoration: none;/*to remove underline*/
     font-weight: bold;
      font-size: 1.2em;   
    }
    ul#navigation li {
     font-size:12px;
     font-weight:bold;
     float:left;/*to horizantally align nav bar*/
    }
    ul#navigation li a {
        /*proper white box to each link in nav bar*/
        padding:0px 70px;
        color:white;
        float: left;
        border-left:1px solid #C2C2C2;
        background: black;
        opacity: 0.5;
    }
                 
                }
		</style>
	</head>
	<body style="background-image:url(meeting_room_bg.png);" align="center">
	<header style="height: 90px;background-color: transparent;">
        <nav id="nav">
               <li> <a href="https://www.mysite.com" title="Mysite"><img src="mylogo.png" width="60" height="70" alt="My Logo" style="float: left;position: absolute;left: -10px;"></img></a></li>
                <ul id="navigation">
                <li><a href="home.html" title="Home">HOME</a></li>
                <li><a href="aboutus.html" title="About Us">ABOUT US</a></li>
                <li><a href="book.html" title="Book">BOOK</a></li>
                <li><a href="time-table.xml" title="Time-Table" style="color: white;">TIME-TABLE</a></li>
                <li><a href="sitemap.html" title="Sitemap">SITEMAP</a></li>
                <li><a href="signup.html" title="Sign Up/Login">SIGN UP</a></li>
            </ul>
        </nav>
    </header>
  
    <div id = "maindiv" align="center" style="background-color: white;opacity: 0.9;width: 1100px;height: 400px;display: block;margin-right: auto;margin-left: auto;" >
      <!-- <div style="padding-top: 20px;">
      <label for="days">Choose a day from week:</label>

        <select id="day" style="width: 100px;height: 40px;border-radius: 5px;">
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
        </select>

        <button id="daybut" style="background: #0055ff;opacity: 05;width: 100px;height: 40px;border-radius: 5px;">Select</button> 
      </div> -->
      <div id="table_place">
      <table border="1" align="center" style="left: 145px;" id="time-table">
                <caption id="caption" style="color: black;font-size: 22px;font-weight: bold;"><div id="inCaption"></div></caption>
                <tr bgcolor="grey" >
                	<th><div id="dayname"></div></th>
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
                <xsl:for-each select="week/day">
                <!--<xsl: sort select="title" data-type="string"/>-->
                <tr bgcolor="white">
                            <td bgcolor="white"><xsl:value-of select="title" /></td>	
                	<xsl:for-each select="duration">
                		<!-- <xsl:sort select="isavailable" data-type="number"/> -->
                		<xsl:choose>
                			<xsl:when test="isavailable=1">
                    		    <td bgcolor="white"><xsl:value-of select="bookedby" /></td>
                    		</xsl:when>    
                   	 		<xsl:otherwise>
	                    		<td bgcolor="red"><xsl:value-of select="bookedby" /></td>            
                        		
                    		</xsl:otherwise>
                		</xsl:choose>
            		</xsl:for-each>
            	</tr>
            	</xsl:for-each>
        </table>
      </div>
        </div>
      <script>
        $(document).ready(function(){
          $("#daybut").click(function(){
            //alert($("#day").val());
            //$("#MainDiv").append("<caption id="caption" style="color: black;font-size: 22px;font-weight: bold;"><b>HELLLO</b></caption>");
            //$("#day").append("<option value="Saturday">Saturday</option>");
            var dayname = $("#day").val();
            $("#inCaption").append("Time-Table for " + dayname);//<strong>$('#day').val()</strong>
          });
        });
      </script>    
     </body>
</html>
</xsl:template>
</xsl:stylesheet>
