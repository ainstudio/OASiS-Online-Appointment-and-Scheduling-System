<?php
include('menuheader.php');
?>

<?php
$title="My Profile";
$query="SELECT * FROM lecturer WHERE Lecturer_ID='1234'";
	$resource=mysql_query($query,$link) or die ("An unexpected error occured while <b>updating</b> the record, Please try again!");
	$result=mysql_fetch_array($resource);
	
	
$connection = mysql_connect("mysql.1freehosting.com", "u432221022_myfyp", "myfyppass");
// select the database that we will be using
mysql_select_db("u432221022_myfyp");


$sql = "SELECT * FROM course WHERE Lecturer_ID='1234'";
$results = mysql_query($sql); // process the query

$username_array = array(); // start an array

while($row = mysql_fetch_array($results)){ 
  $username_array[] = "- ".$row['Course_Name']." - ".$row['Course_Code'].""; 
}

$username_string = implode("<br/>", $username_array); 

 
	

$content="


<center><br/>

<table width=\"450\" style=\"border-width: 2px; border-style: dotted; border-color: green; border-radius: 25px; background-color: #FAFAFA;\" ><tr><td><br/>
<center><table width=\"410\">
<tr><td width=\"115\"><center><img src=\"http://".$result[8]."\" width=\"95\" height=\"105\" border=\"1\"></img></center></td>
<td width=\"295\"><h2>".$result[2]."

".$result[3]."</h2><b>

Department of ".$result[7]."
</b>
<br/><i>Kuliyyah of ".$result[6]."</i></td>
<tr><td colspan=\"2\">
<b>Current Subject</b><br/>
".
$username_string."<br/><br/>
</td></tr>
<tr><td colspan=\"2\">
<b>Office Location: </b>".$result[10]."<br/><br/>
</td></tr>
<tr><td>	
<img src=\"/image/phone1.png\"></img> 0".$result[4]."</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"/image/email1.png\"></img>".$result[5]."</td></tr>
</table>
</center>
<br/></td></tr></table>
</center>

		";

include ("tempelate.php");
	?>