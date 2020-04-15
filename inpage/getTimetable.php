<?php
$mysqli = new mysqli("localhost", "root", "root", "test");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "select startTime,endtime,bookedby from timetable where id=? AND date1=?";
// echo $_GET['roomName'] . '    ' . $_GET['date'];
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $_GET['roomName'], $_GET['date']);
// echo $stmt;
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($stime, $etime, $booked);
$strttime = array();
$endtime = array();
$bookedby = array();
//echo "hi";
while($stmt->fetch()){
	
	// echo $stime;
	// echo $etime;
	// echo $booked;
	array_push($strttime, $stime);
	array_push($endtime, $etime);
	array_push($bookedby, $booked);
}
$stmt->close();
$sql1 = "select distinct room from timetable where id = ?";
$stmt1 = $mysqli->prepare($sql1);
$stmt1->bind_param("s", $_GET['roomName']);
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($room);
$stmt1->fetch();
// echo $room;
$stmt1->close();
echo '<table border="1" align="center" style="left: 260px;" id="time-table">
                <caption id="caption" style="color: black;font-size: 22px;font-weight: bold;">'.'Time-Table for ' . $room . ' on ' . $_GET['date'].'</caption>
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
                <tr>';
$j=0;
for($i=9;$i<18;$i++) {
	$bkby = "FREE SLOT";
	if(count($strttime)>$j && ($i == $strttime[$j])) {
		while($i!=$endtime[$j]) {
			echo '<td bgcolor="yellow">'.$bookedby[$j].'</td>';
			$i++;
		}
		$i--;
		$j++;
	}else {
		echo '<td>FREE SLOT</td>';
	}
}
echo '</tr>
	</table>';                
?>