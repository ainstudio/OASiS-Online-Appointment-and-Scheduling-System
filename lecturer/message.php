<?php
include('auth.php');
?>
<?php
$title="Inbox";
$Lecturer_ID = $_SESSION['myuser'];
		$query="SELECT * FROM message WHERE Lecturer_ID = '".$Lecturer_ID."' AND Sender = 'student' ORDER BY Message_ID DESC ";
		  $resource=mysql_query($query,$link);
		  $username_array = array();
	
	
	
	while($row = mysql_fetch_array($resource)){

			$query2="SELECT * FROM student WHERE Student_ID = '".$row['Student_ID']."' ";
		  $resource2=mysql_query($query2,$link);
	while($row2 = mysql_fetch_array($resource2)){
	
	if ($row['Note'] == "read")
	{
	$status = "<img src=\"http://iiumoasis.com/image/orange.png\" title=\"Read\" width=\"7\" height=\"7\" border=\"0\" ></img>";
	}
	else if ($row['Note'] == "unread")
	{
	$status = "<img src=\"http://iiumoasis.com/image/red.png\" title=\"Unread\" width=\"7\" height=\"7\" border=\"0\" ></img>";
	}
	else if ($row['Note'] == "replied")
	{
	$status = "<img src=\"http://iiumoasis.com/image/green.png\" title=\"Replied\" width=\"7\" height=\"7\" border=\"0\" ></img>";
	}
 
$name = $row2['Student_fname']."&nbsp;".$row2['Student_lname']; 
$dateo = substr($row['Message_time'], 0, 10); 
 $username_array[] = "<tr><td><center>".$status."</center></td><td>".substr($name, 0, 20)."</td><td>".substr($row['Message_content'], 0, 50)."</td><td><center>".$dateo."</center></td><td><center>
	<a href=\"viewmessage.php?Message_ID=".$row['Message_ID']."&Student_ID=".$row['Student_ID']."\"><img title=\"View Message\" width=\"24\" height=\"24\"  border=\"0\" src=\"../image/viewmessage.png\"/></a>	
	</center></td></tr>";
}
}
$username_string = implode("", $username_array); 
	
$content="<div  align=\"right\"><a href=\"message2.php\"><img  border=\"0\" src=\"../image/sentmsgbutton.png\" title=\"View Sent Message\"></img></a><br/></div>
<center><table width=\"650\" style=\"background-color: #EFFBEF; border: 1px solid green;\"><tr>
	<td></td><td><b>Student Name</b></td><td><b>Message</b></td><td><center><b>Date</b></center></td><td><center><b>Action</b></center></td></tr>".$username_string." 	 		
	</table>";
	
include ("../tempelate.php");
	?>