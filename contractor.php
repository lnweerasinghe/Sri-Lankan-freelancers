<?php

    error_reporting(0);

    session_start();
    include "connection.php";
    


?>

<!DOCTYPE html >
<html>
    <head>
        <title>Login Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            .wrapper{
                width: 350px;
                height:450px;
                position:relative; left:-35px; top:100px;
                background-color: #f5ff91;
                padding-right: 10px;
                padding-left:  10px;
                overflow:hidden;
            }

            #column2{
                float:right;
                margin-right: 260px;
                margin-top: -70px;
            }

            #column3{
                float:right;
                margin-right: -300px;
                margin-top: -260px;
                
            }


            
            .dropdown {
                    position: relative;
                    display: inline-block;
                    }
            .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                    }

                    .dropdown:hover .dropdown-content {
                    display: block;
                    }
        </style>
    </head>    
    <body style="background-color: #99bee2;">
        <div class="container">
            
            <div class="wrapper" >
                <?php
                    $q0=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row6=mysqli_fetch_assoc($q0);
                    $va7=$row6['user_id'];
                    $q7=mysqli_query($conn,"SELECT * FROM customers where user_id='$va7';");
                    $row7=mysqli_fetch_assoc($q7);
                    $va8=$row7['customer_id'];


                    $q=mysqli_query($conn,"SELECT * FROM user where username='".$_GET["pid"]."';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['propic'];
                    $val=$row['user_id'];
                    
                    $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val';");
                    $row1=mysqli_fetch_assoc($q1);
                    $val6=$row1['contractor_id'];
                    $val2=$row1['town'];
                    $val3=$row1['district'];
                    $q2=mysqli_query($conn,"SELECT * FROM town where town_id='$val2' ;");
                    $q3=mysqli_query($conn,"SELECT * FROM district where district_id='$val3' ;");
                    $row2=mysqli_fetch_assoc($q2);
                    $row3=mysqli_fetch_assoc($q3);
                    $val4=$row1['contractor_id'];
                    $q4=mysqli_query($conn,"SELECT * FROM contractor_task where contractor_id='$val4';");
                    $row4=mysqli_fetch_assoc($q4);
                    $val5=$row4['task_id'];
                    $q5=mysqli_query($conn,"SELECT * FROM task where task_id='$val5';");
                    $row5=mysqli_fetch_assoc($q5);

                ?>
                <h2 style="text-align: center;">profile</h2>
                
                    <div style="text-align: center;">
                        <h4>
                            <?php echo $row['username']; ?>
                        </h4>
                    </div>
                <?php
                    $row1=mysqli_fetch_array($q);
                    
                   
                    echo "<div style='text-align: center'>";
                    echo "<tr>";
                    if(empty($val0)){
                        echo  "<td>";
                            echo'<img  class="rounded-circle" class="img-fluid" width="200" height="200" src="img/pic.jpg"/> ';
                        echo  "</td>";
                    }
                    else{
                        echo  "<td>";
                            echo'<img  class="rounded-circle" class="img-fluid" width="200" height="200" src="data:image;base64,'.base64_encode($row['propic']).'"/> ';
                        echo  "</td>";
                    }
                    echo "</tr>";
                    echo "</div>";

                    echo "<table>";
                        echo "<tr>";
                            echo  "<td>";
                                echo"<b> first name: </b>";
                            echo  "</td>";

                            echo  "<td>";
                                echo $row['first_name'] ;
                            echo  "</td>";
                        echo "</tr>";

                        
                        echo "<tr>";
                            echo  "<td>";
                                echo"<b> last name: </b>";
                            echo  "</td>";

                            echo  "<td>";
                                echo $row['last_name'] ;
                            echo  "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo  "<td>";
                                echo"<b> NIC: </b>";
                            echo  "</td>";

                            echo  "<td>";
                                echo $row['NIC'] ;
                            echo  "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo  "<td>";
                                echo"<b> town: </b>";
                            echo  "</td>";

                            echo  "<td>";
                                echo $row2['town'] ;
                            echo  "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo  "<td>";
                                echo"<b> district: </b>";
                            echo  "</td>";

                            echo  "<td>";
                                echo $row3['district'] ;
                            echo  "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo  "<td>";
                                echo"<b> task: </b>";
                            echo  "</td>";

                            echo  "<td>";
                                echo $row5['task_name'] ;
                            echo  "</td>";
                        echo "</tr>";
                    echo "</table>";
                ?>
            </div>

            <div id ="column2" class="form-input">

                    <?php
                        $q=mysqli_query($conn,"SELECT * FROM user where username='".$_GET["pid"]."';");
                        $row=mysqli_fetch_assoc($q);
                        $val=$row['user_id'];
                        
                        $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val';");
                        $row1=mysqli_fetch_assoc($q1);

                    if(empty($row1['projpic1'])){
                        echo"<img src='img/pic.jpg' id='display1' width='150' height='170'>&nbsp";
                    }
                    else{
                        echo"<div class='dropdown'>
                        <div class='dropdown-content'>
                        <img src='data:image;base64,".base64_encode($row1['projpic1'])."' alt='' width='300' height='200'>
                        
                        </div>
                        <img src='data:image;base64,".base64_encode($row1['projpic1'])."' id='display' width='150' height='170'> 
                        </div>
                        ";
                        
                    }

                    if(empty($row1['projpic2'])){
                        echo"<img src='img/pic.jpg' id='display1' width='150' height='170'>&nbsp";
                    }
                    else{
                        
                        echo"<div class='dropdown'>
                        <div class='dropdown-content'>
                        <img src='data:image;base64,".base64_encode($row1['projpic2'])."' alt='' width='300' height='200'>
                        
                        </div>
                        <img src='data:image;base64,".base64_encode($row1['projpic2'])."' id='display' width='150' height='170'> 
                        </div>
                        ";
                    }

                    if(empty($row1['projpic3'])){
                        echo"<img src='img/pic.jpg' id='display1' width='150' height='170'>";
                    }
                    else{
                       
                        echo"<div class='dropdown'>
                        <div class='dropdown-content'>
                        <img src='data:image;base64,".base64_encode($row1['projpic3'])."' alt='' width='300' height='200'>
                        
                        </div>
                        <img src='data:image;base64,".base64_encode($row1['projpic3'])."' id='display' width='150' height='170'> 
                        </div>
                        ";
                    }
                    ?>

            </div>       
                
            <?php
                                

                                   $query111 = "SELECT * FROM contract where customer_id='$va8' AND contractor_id='$val6' ORDER BY rating_id DESC LIMIT 1;";
                                   $result111 = mysqli_query($conn,$query111);
                
                if(mysqli_num_rows($result111) > 0){
            
                        $status22 = mysqli_query($conn,"SELECT state FROM contract where customer_id='$va8' AND contractor_id='$val6' ORDER BY rating_id DESC LIMIT 1;");
                        $row15=mysqli_fetch_assoc($status22);
                        $state = (string)$row15['state'];
                        if ($state == 'pending')
                        {
                            
                            
                            echo '<div id ="column3" class="button">';
		                    echo '<form action="" method="post">';
			                echo '<div style="margin: 10px;"> Start Date: <input type="date" name="sdate" value="" /></div>';
			                echo '<div style="margin: 10px;"> End Date   : <input type="date" name="edate" value="" /></div>';
                            echo '<div style="margin: 10px;"><button type="button" onclick="submitForm();" name="save_contract" id="save_contract" class="btn btn-primary request_button" disabled><i class="fa fa-user-plus"></i> pending</button></div>';
                            echo '<div id ="column3" class="button">';
                        }
                        
                        else if ($state == 'expird')
                        {
                            
                            echo '<div id ="column3" class="button">';
		                    echo '<form action="" method="post">';
			                echo '<div style="margin: 10px;"> Start Date: <input type="date" name="sdate" value="" /></div>';
			                echo '<div style="margin: 10px;"> End Date   : <input type="date" name="edate" value="" /></div>';
                            echo '<div style="margin: 10px;"><button type="button" onclick="submitForm();" name="save_contract" id="save_contract" class="btn btn-primary request_button" ><i class="fa fa-user-plus"></i>  Request</button></div>';
                            echo '</div>';
                            
                        }
                        else if ($state == 'rejected')
                        {
                            
                            echo '<div id ="column3" class="button">';
		                    echo '<form action="" method="post">';
			                echo '<div style="margin: 10px;"> Start Date: <input type="date" name="sdate" value="" /></div>';
			                echo '<div style="margin: 10px;"> End Date   : <input type="date" name="edate" value="" /></div>';
                            echo '<div style="margin: 10px;"><button type="button" onclick="submitForm();" name="save_contract" id="save_contract" class="btn btn-primary request_button" ><i class="fa fa-user-plus"></i>  Request</button></div>';
                            echo '</div>';
                            
                        }
                        else 
                        {
                           
                            echo '<div id ="column3" class="button">';
		                    echo '<form action="" method="post">';
			                echo '<div style="margin: 10px;"> Start Date: <input type="date" name="sdate" value="" /></div>';
			                echo '<div style="margin: 10px;"> End Date   : <input type="date" name="edate" value="" /></div>';
                            echo '<div style="margin: 10px;"><button type="button" onclick="submitForm();" name="save_contract" id="save_contract" class="btn btn-primary request_button" ><i class="fa fa-user-plus"></i>  Request</button></div>';
                            echo '</div>';
                        }
                    

                }
                else 
                        {
                            
                            echo '<div id ="column3" class="button">';
		                    echo '<form action="" method="post">';
			                echo '<div style="margin: 10px;"> Start Date: <input type="date" name="sdate" value="" /></div>';
			                echo '<div style="margin: 10px;"> End Date   : <input type="date" name="edate" value="" /></div>';
                            echo '<div style="margin: 10px;"><button type="button" onclick="submitForm();" name="save_contract" id="save_contract" class="btn btn-primary request_button" ><i class="fa fa-user-plus"></i>  Request</button></div>';
                            echo '</div>';
                        }



            ?>


             
            
                    <!--form upload ajax-->
                    <script type="text/javascript">
		                function submitForm()
		                    {
                                
			                    var sdate = $('input[name=sdate]').val();
			                    var edate = $('input[name=edate]').val();
			                    var contractorid = '<?php echo $val6; ?>';
                                var customerid = '<?php echo $va8; ?>';
                                var bt = document.getElementById('save_contract');
                                
                                                
			                        if(sdate != '' && edate!= '' && contractorid != '' && customerid != '')
			                        {
				                        var formData = {sdate: sdate, edate: edate, contractorid: contractorid, customerid: customerid};
				                        $('#message').html('<span style="color: red">Processing form. . . please wait. . .</span>');
				                        $.ajax({url:"request_process.php", type:"POST", data:formData, success:function(response)
				                            {
                                                
					                            var res = JSON.parse(response);
					                            console.log(res);
					                            if(res.success == true){
						                            $('#message').html('<span style="color: green">Request sent successfully</span>');
                                                    $('#save_contract').html('<i class="fa fa-clock-o" > Request Send</i>');
                                                    
                                                                bt.disabled = true;

                                                }    
					                            else{
						                            $('#message').html('<span style="color: red">Form not submitted. Some error in running the database query.</span>');
                                                }
				                            }
				                                });
			                        }
			                        else
			                            {
				                            $('#message').html('<span style="color: red">Please fill all the fields</span>');
                                            alert("Please fill all the fields");
			                            }
			
			
		                    }
                            
                            
	                </script>

        </div>
    </body>
</html>
