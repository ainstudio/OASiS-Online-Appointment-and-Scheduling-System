<?php
include('auth.php');
include('../connect.php');

$title="Delete Student's Record";

	 $Student_ID=$_REQUEST['Student_ID']; 
			
	 $query="DELETE FROM student WHERE Student_ID='".$Student_ID."'";
	
		  if(!mysql_query($query,$link))
		  {die (
		  
		  $content="
<br/><center><h3>An unexpected error occured while deleting the record, Please try again!</h3></center>");}
		  else
		 {
		 $content = "<center><table width=\"350\" style=\"border-width: 2px; border-style: dotted; border-color: green; border-radius: 25px; background-color: #EFFBEF;\" ><tr><td><br/><center>
The record successfully<br/> 
removed from the system!<br/>Please <a href=\"student.php\"><b>Click Here</b></a> to view <br/>the Student's list<br/>&nbsp;</center></td></tr></table></center>";}

		  
		  
include ("../tempelate.php");
	 ?>