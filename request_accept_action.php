<?php
	 error_reporting(0);
	session_start();
    require_once('connection.php');

    if($_POST["action"] == "button") {
		$contractorid = $_POST['contractorid'];
        $customerid = $_POST['customerid'];
					$sql = "UPDATE contract SET state = 'accepted' WHERE contractor_id= '$contractorid' AND customer_id= '$customerid' AND state ='pending'";
					$result1=mysqli_query($conn, $sql);
					// Execute the statement
					 if (mysqli_query($conn, $sql)) {
						echo "Update successful!";
                        echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 

					} else {
						echo "Error updating record: " . mysqli_error($conn);
					}

	} 


    if($_POST["action"] == "RejectButton") {
		$contractorid = $_POST['contractorid'];
        $customerid = $_POST['customerid'];
		
					$sql = "UPDATE contract SET state = 'rejected' WHERE contractor_id= '$contractorid' AND customer_id= '$customerid' AND state ='pending'";
					$result1=mysqli_query($conn, $sql);
					// Execute the statement
					 if (mysqli_query($conn, $sql)) {
						echo "Update successful!";
					} else {
						echo "Error updating record: " . mysqli_error($conn);
					}

		
	} 
    ?>