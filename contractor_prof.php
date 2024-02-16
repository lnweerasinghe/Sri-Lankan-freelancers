<?php

    error_reporting(0);

    session_start();
    include "connection.php";
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];


?>

<!DOCTYPE html >
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">

     
            
            .wrapper{
                width: 350px;
                height:470px;
                position:relative; left:-35px; top:60px;
                background-color: #f5ff91;
                padding-right: 10px;
                padding-left:  10px;
                overflow:hidden;
            }

            #column2{
                float:right;
                margin-right: 320px;
                margin-top: -160px;
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

        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">Profile</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="" href="Requests.php" id="requests_area">Requests <span id="unseen_request_area" class="fa fa-bell"></span> </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Analysis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deleteContractorAc.php">Delete my account</a>
                </li>
                <li class="nav-item">
                   
                    <button class="nav-link" class="btn btn-primary" style="margin-left:750px; background-color: #2B60DE; border: none; border-radius: 12px;" onclick="window.location='Home.php';" >Logout</button>
                </li>
            </ul>
        </nav>
        <div class="container">
            
            <div class="wrapper" >
                <?php
                    
                    $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]' OR username='".$_GET["pid"]."';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['propic'];
                    $val=$row['user_id'];
                    
                    $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val';");
                    $row1=mysqli_fetch_assoc($q1);
                    $proj1=$row1['projpic1'];
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
                            <?php echo $_SESSION['LoginUser']; ?>
                        </h4>
                    </div>
                <?php
                    $row1=mysqli_fetch_array($q);
                    
                   
                    echo "<div style='text-align:center'>";
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

                    echo "</table>";
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style='text-align: center;' href='contractorProfileEdit.php'>Edit Profile Info<a/>";
                    echo "</div>";
                ?>
            </div>

            <div id ="column2" class="form-input">

                    <?php
                        $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]' OR username='".$_GET["pid"]."';");
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

            
            
<script type="text/javascript">
//noti start
var contractorid = '<?php echo $val4; ?>';
        $(document).ready(function() {
                

        function fetchData() {

            var action = 'count_un_seen_request';

            $.ajax({
                    url: "request_action.php",
                    method:"POST",
                    data:{action:action},
                    success: function(data) {
                        $("#requests_area").html(data);
                       
                    }
                });
        }

                fetchData();

                setInterval(fetchData, 5000);
        });
//noti end


$(document).ready(function () {
            // Event listener for file input change
            $(".image").click(function() {
                // Get the selected file
                var file = this.files[0];

                // Check if a file is selected
                if (file) {
                    // Check if the file is a JPEG or JPG file
                    if (file.type === 'image/jpeg' || file.type === 'image/jpg') {
                        var formData = new FormData();
                        formData.append('image', file);
                        var action3 = 'uploadimg';
                        // AJAX request to handle file upload
                        $.ajax({
                            url: 'imgupload.php',
                            type: 'POST',
                            data: { formData, action3:action3 },
                            /* contentType: false,
                            processData: false, */
                            success: function (response) {
                                // Handle the response (e.g., display a success message)
                                console.log(response);
                            },
                            error: function (xhr, status, error) {
                                // Handle errors
                                console.error(xhr.responseText);
                            }
                        }); 
                    } else {
                        // Display an error message for invalid file type
                        alert('Error: Please select a JPEG or JPG file.');
                    }
                }
            });
        });


</script>
            

        </div>
    </body>
</html>
