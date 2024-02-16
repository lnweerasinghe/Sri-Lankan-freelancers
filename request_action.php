<?php
	 error_reporting(0);
	session_start();
    require_once('connection.php');


	if($_POST["action"] == "unseen_request"){ 
		$contractorid = $_POST['contractorid'];
		
		$sql = "SELECT u.*,c.* FROM contract c JOIN customers cust ON c.customer_id = cust.customer_id JOIN user u ON cust.user_id = u.user_id WHERE c.contractor_id = '$contractorid' AND state ='pending'";
		$result2 = $conn->query($sql);
		$val1=$result1['customer_id']; 
		 $list = '<ul>';
			while ($row1 = $result2->fetch_assoc()) {

				

  					 $list .= '<li> <b class="text-primary"> project request from: ' . $row1['username'] .'&nbsp</br> Start Date: '. $row1['StartDate'] .'</br>&nbspEnd Date: '. $row1['EndDate'] . '</b></li>
					  <button type="button" name="accept_request_button" class="btn btn-primary btn-xs pull-right accept_request_button" value="'.$row1["customer_id"].'" id="accept_request_button" ><i class="fa fa-plus" aria-hidden="true"></i> Accept</button>
					  &nbsp&nbsp<button type="button" name="reject_request_button" class="btn btn-primary btn-xs pull-right reject_request_button" value="'.$row1["customer_id"].'" id="reject_request_button"><i class="fa fa-plus" aria-hidden="true"></i> Reject</button></br></br>'; 
				}
				
			 
		$list .= '</ul>';

		echo $list; 
		echo '<script>
		$(document).ready(function(){
		
        $(".accept_request_button").click(function(){
        // Make an AJAX request to a PHP script
		var action = "button";
		var customerid = $(this).val();
		var contractorid =  ';echo $contractorid;
		echo ';$.ajax({
            type: "POST",
            //url: window.location.href, // Replace with the actual path to your server-side script
			url:"request_accept_action.php",
            data: {
                // Any parameters you want to send to the server
                buttonPressed: true,action:action,contractorid:contractorid,customerid: customerid
            },
			beforeSend:function()
    			{
    				/* $("#accept_request_button").attr("disabled", "disabled");
    				$("#accept_request_button").html("<i class="fa fa-circle-o-notch fa-spin"></i> wait..."); */
    			},
            success: function(response){
                	
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: " + status + " - " + error);
            }
            });
         });
		


		 //reject
		 $(".reject_request_button").click(function(){
			// Make an AJAX request to a PHP script
			var action = "RejectButton";
			var customerid = $(this).val();
			var contractorid =  ';echo $contractorid;
			echo ';$.ajax({
				type: "POST",
				//url: window.location.href, // Replace with the actual path to your server-side script
				url:"request_accept_action.php",
				data: {
					// Any parameters you want to send to the server
					buttonPressed: true,action:action,contractorid:contractorid,customerid: customerid
				},
				beforeSend:function()
					{
						/* $("#accept_request_button").attr("disabled", "disabled");
						$("#accept_request_button").html("<i class="fa fa-circle-o-notch fa-spin"></i> wait..."); */
					},
				success: function(response){
					/* sessionStorage.setItem("alertMessage", "This is an alert from source_page.php.");

					// Redirect to the target page
					window.location.href = "customer.php"; */
				},
				error: function(xhr, status, error){
					console.error("AJAX Error: " + status + " - " + error);
				}
				});
			 });
        });</script>' ; 
		}


    if($_POST["action"] == "count_un_seen_request")                                                                                                                                                            
	{
		$q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]' OR username='".$_GET["pid"]."';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['propic'];
                    $val=$row['user_id'];
                    $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val';");
                    $row1=mysqli_fetch_assoc($q1);
					$val4=$row1['contractor_id'];

		$query = mysqli_query($conn,"SELECT COUNT(rating_id) as Total FROM contract WHERE contractor_id='$val4' AND state='Pending';");

		$result1 = mysqli_fetch_assoc($query);

		foreach($result1 as $row1)
		{
			echo '<a class="nav-link" href="Requests.php" id="requests_area">Requests<span id="unseen_request_area" class="fa fa-bell" style="color:red">'.$row1.'</span> </a>';
		}
	}
	

	if($_POST["action1"] == "accepted_request")
	{
		$contractorid1 = $_POST['contractorid'];
		$sql3 = "SELECT u.*,c.* FROM contract c JOIN customers cust ON c.customer_id = cust.customer_id JOIN user u ON cust.user_id = u.user_id WHERE c.contractor_id = '$contractorid1' AND state ='accepted'";
		$result21 = $conn->query($sql3);
		$val1=$result1['customer_id'];

		$list .= '<ul id="acceptlist" style="  background-color: #A9F5F2;" >';
			while ($row1 = $result21->fetch_assoc()){

				
				
				$list .= '<li style=" color:blue;">project from:&nbsp;'.$row1['username'].'</br>&nbsp;&nbsp;&nbsp;Start Date:&nbsp;'. $row1['StartDate'] .'</br>&nbsp;&nbsp;&nbsp;End Date:&nbsp;'.$row1['EndDate'].'</li></br>'; 
				}
				
			 
		$list .= '</ul>';
		echo $list;
	}

	if($_POST["action2"] == "reject_request")
	{
		$contractorid1 = $_POST['contractorid'];
		$sql3 = "SELECT u.*,c.* FROM contract c JOIN customers cust ON c.customer_id = cust.customer_id JOIN user u ON cust.user_id = u.user_id WHERE c.contractor_id = '$contractorid1' AND state ='expird' OR c.contractor_id = '$contractorid1' AND state ='rejected'";
		$result21 = $conn->query($sql3);
		$val1=$result1['customer_id'];

		$list .= '<ul id="acceptlist" style="  background-color: #A9F5F2;" >';
			while ($row1 = $result21->fetch_assoc()){

				
				$list .= '<li style=" color:blue;">project from:&nbsp;'.$row1['username'].'</br>&nbsp;&nbsp;&nbsp;Start Date:&nbsp;'. $row1['StartDate'] .'</br>&nbsp;&nbsp;&nbsp;End Date:&nbsp;'.$row1['EndDate'].'</li></br>'; 
				}
				
			 
		$list .= '</ul>';
		echo $list;
	}

?>