<?php 
    require_once('connection.php');

    $response = array('success' => false);

if(isset($_POST['sdate']) && $_POST['sdate']!='' && isset($_POST['edate']) && $_POST['edate']!='' && $_POST['contractorid']!='' && $_POST['customerid']!='')
{
    
    $stdate = date('Y-m-d', strtotime($_POST['sdate']));
    
    $endate = date('Y-m-d', strtotime($_POST['edate']));

	$sql = "INSERT INTO contract(StartDate, EndDate, contractor_id, customer_id, state)  VALUES('$stdate', '$endate', '".addslashes($_POST['contractorid'])."', '".addslashes($_POST['customerid'])."', 'pending')";
	
	if($conn->query($sql))
	{
		$response['success'] = true;
	}
}

echo json_encode($response);


?>