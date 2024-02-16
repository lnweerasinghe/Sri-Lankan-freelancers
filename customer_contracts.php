<?php

session_start();

include "connection.php";


?>

<!DOCTYPE html >
<html lang="en">
    <head>
        <title>Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">

        <style>
        body {
            margin: 10;
            display: flex;
            height: 95vh; /* Set the body height to 100% of the viewport */
            background-color: #F5F6CE;
        }

        .container {
            display: flex;
            width: 100%;
            overflow: hidden; /* Hide the horizontal scrollbar of the container */
            
        }

        .column {
            flex: 1;
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            overflow-y: auto; /* Enable vertical scroll when content exceeds height */
            height: 100%; /* Set the height of each column to 100% of the container */
            background-color: #F4FA58;
            opacity: 95%;
        }

        .column h2 {
            padding: 20px;
            background-color: #58ACFA;
            margin: 0;
            position: sticky;
            top: 0;
            z-index: 1;
            text-align:center;
            font-family:verdana;
            font-size:30px;
            color:#0040FF;
        }

        .content {
            padding: 20px;
           
        }
    </style>
    </head>

    <body>

    <div class="container">
        <div class="column" >
            <h2  >Pending Requests</br>  &nbsp;</h2>
                <div class="content" >
                <ul id="list" style="  background-color: #A9F5F2;"></ul>
           
                </div>
        </div>

        <div class="column">
            <h2 >Accepted Request</br>  &nbsp;</h2>
            <div class="content">
                <ul id="acceptlist" style="  background-color: #A9F5F2;" ></ul>
           
            </div>
        </div>

        <div class="column">
            <h2 >Rejected and Expird Request</h2>
            <div class="content">
                <ul id="rejectlist" style="  background-color: #A9F5F2;" ></ul>
    
            </div>
        </div>
    </div>

	<?php 
					$q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row=mysqli_fetch_assoc($q);
                   
                    $val=$row['user_id'];
                    
                    $q1=mysqli_query($conn,"SELECT * FROM customers where user_id='$val';");
                    $row1=mysqli_fetch_assoc($q1);
					$val4=$row1['customer_id'];
                    
	?>

	<script>
        var customerid = '<?php echo $val4; ?>';

        function fetchData() {
            var action = 'pending_request';
            $.ajax({
                    url: "customer_contract_action.php",
                    type: "POST",
                    data: { customerid:customerid, action:action },
                    success: function(data) {
                        
                        $("#list").html(data); 
                    }
                });
        }

                fetchData();

                setInterval(fetchData, 1000);


        //update accepted requests

        function updateData() {
            var action1 = 'accepted_request';
            
            $.ajax({
                url: "customer_contract_action.php", // PHP script to fetch new data
                type: "POST", // Change to POST
                /* dataType: 'html', */
                data: { customerid:customerid, action1:action1 },
                success: function (data) {
                    $('#acceptlist').html(data); // Update the content
                },
                /* error: function () {
                    console.error('Failed to fetch data');
                } */
            });
        }

    // Initial data load on page load
    updateData();

    // Periodically update data every 5 seconds (adjust as needed)
        setInterval(updateData, 1000);

        // update accept rerq end
    
        //rejectlist
        function updateRejectData() {
            var action2 = 'reject_request';
            
            $.ajax({
                url: "customer_contract_action.php", // PHP script to fetch new data
                type: "POST", 
                data: { customerid:customerid, action2:action2 },
                success: function (data) {
                    $('#rejectlist').html(data); // Update the content
                },
                /* error: function () {
                    console.error('Failed to fetch data');
                } */
            });
        }

    // Initial data load on page load
    updateRejectData();

    // Periodically update data every 5 seconds (adjust as needed)
        setInterval(updateRejectData, 1000);

    </script>
    
    </body> 
</html>