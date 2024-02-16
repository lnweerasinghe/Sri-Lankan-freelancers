<?php
	error_reporting(0);
	session_start();
    require_once('connection.php');
	

	if($_POST["action"] == "pending_request"){ 
		$customerid = $_POST['customerid'];
		$sql3 = "SELECT u.*,c.* FROM contract c JOIN contractor con ON c.contractor_id = con.contractor_id JOIN user u ON con.user_id = u.user_id WHERE c.customer_id = '$customerid' AND state ='pending'";
		$result2 = $conn->query($sql3);
		$val1=$result1['contractor_id']; 
		 $list = '<ul>';
			while ($row1 = $result2->fetch_assoc()) {
				$list .= '<li style=" color:blue;">Contractor:&nbsp;'.$row1['username'].'</br>&nbsp;&nbsp;&nbsp;Start Date:&nbsp;'. $row1['StartDate'] .'</br>&nbsp;&nbsp;&nbsp;End Date:&nbsp;'.$row1['EndDate'].'</li></br>'; 
			}
				
			 
		 $list .= '</ul>';

		 echo $list; 
        }
    
	

	if($_POST["action1"] == "accepted_request")
	{
		$customerid = $_POST['customerid'];
		$sql3 = "SELECT u.*,c.* FROM contract c JOIN contractor con ON c.contractor_id = con.contractor_id JOIN user u ON con.user_id = u.user_id WHERE c.customer_id = '$customerid' AND state ='accepted'";
		$result21 = $conn->query($sql3);
		$val1=$result1['contractor_id'];

		$list .= '<ul id="acceptlist" style="  background-color: #A9F5F2;" >';
			while ($row1 = $result21->fetch_assoc()){
				$list .= '<li style=" color:blue;">Contractor:&nbsp;'.$row1['username'].'</br>&nbsp;&nbsp;&nbsp;Start Date:&nbsp;'. $row1['StartDate'] .'</br>&nbsp;&nbsp;&nbsp;End Date:&nbsp;'.$row1['EndDate'].'</li></br>'; 
			}
				
			 
		$list .= '</ul>';
		echo $list;
	}

	if($_POST["action2"] == "reject_request")
	{
		$customerid = $_POST['customerid'];
		$sql3 = "SELECT u.*,c.* FROM contract c JOIN contractor con ON c.contractor_id = con.contractor_id JOIN user u ON con.user_id = u.user_id WHERE c.customer_id = '$customerid' AND state ='expird' OR c.customer_id = '$customerid' AND state ='rejected'";
		$result21 = $conn->query($sql3);
		$val1=$result1['contractor_id'];

		$list .= '<ul id="acceptlist" style="  background-color: #A9F5F2;" >';
			while ($row1 = $result21->fetch_assoc()){
				$list .= '<li style=" color:blue;">Contractor:&nbsp;'.$row1['username'].'</br>&nbsp;&nbsp;&nbsp;Start Date:&nbsp;'. $row1['StartDate'] .'</br>&nbsp;&nbsp;&nbsp;End Date:&nbsp;'.$row1['EndDate'].'</li></br>'; 
			}
				
			 
		$list .= '</ul>';
		echo $list;
	}

?>