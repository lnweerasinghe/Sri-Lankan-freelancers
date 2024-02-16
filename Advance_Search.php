<?php
session_start();

include "connection.php";

?>

<!DOCTYPE html>
<html >
    <head>
        
        <title>advance search</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="cregister.css">

        <style>

        /*grid */
            /* Container for the grid */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* Five columns in one row */
            gap: 20px; /* Adjust the gap between grid items */
            margin-left: 5%;
            margin-right: 5%;
        }

        /* Style for each result box */
        .result-box {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        /* Style for the image */
        .result-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px; /* Optional: Add border-radius for rounded corners */
        }

        /* Style for the description */
        .result-description {
            margin-top: 10px;
        }
        /* grid end*/

        /* Container styling */
        .select-container {
            display: flex;
            gap: 100px; /* Adjust the gap between select elements */
            margin: 0 auto;
            margin-left: 10%;
            margin-right: 5%;
        }

        /* Individual select element styling */
        select {
            width: 100%; /* Adjust the width of the select elements as needed */
            padding: 5px;
        }
    </style>
        
        <script type="text/javascript">
            $(document).ready(function(){
               
                $('#location').change(function(){
                    var district_id = $(this).val();
                    var action = 'action';
                    $.ajax({
                        url: "advance_search_action.php",
                        method:"POST",
                        data: {districtid : district_id, action:action},

                        success:function(data){
                                $('#town').html(data);
                        } 
                        
                    });
                });            
            });

        /*search */

        $(document).ready(function(){
                                $("#search").click(function(event){
                                    event.preventDefault();    
                                    var location = $("#location").val();
                                    var town = $("#town").val();
                                    var tasks = $("#tasks").val();
                                
                                                
			                        if(location != '' && town != '' && tasks != '')
			                        { 
				                        $.ajax({
                                            url:"advance_search_action.php", 
                                            type:"POST", 
                                            data:{location:location, town:town, tasks:tasks}, 
                                            success:function(data)
				                            {
                                                $("#resultGrid").html(data);
					                            
				                            },
                                            error: function () {
                                                        console.error('Failed to fetch search results');},
				                                });
			                        }
			                        else
			                            {
				                            $('#message').html('<span style="color: red">Please fill all the fields</span>');
                                            alert("Please fill all the fields");
			                            }
			
                                    });        
		                    
                                });
        /*search end */    
        </script>
    </head>

    <body style="background-color: #99bee2;">
    
            <div class="com-md-6">
            <h3 class="text-center">Contractor search</h3><hr/>    
            <form role="form" action="" method="POST" enctype="multipart/form-data">
            <div class="select-container">           
                <div class="from-group">
                <label>District</label>
                   <select name="district" class="from-control" id="location" >
                    <option selected="">select district</option>
                        <?php
                            require 'connection.php';

                            $sql = mysqli_query( $conn, "SELECT * FROM district ORDER BY district");
                            while($row = mysqli_fetch_array($sql))
                            {
                            ?>
                            </br>    <option value="<?php echo $row['district'];?>"><?php echo $row['district'];?></option>;
                            <?php
                            }
                            ?>
                    </select>
                </div>
                <div class="from-group">
                <label>Town</label>
                        <select name="town" type="text" id="town"class="form-control " style="width:200px;">
                <option value="" selected="selected" style="width:200px;">select town</option>
                </select>
                </div>
            
              
                <div class="from-group">
                     <label>Task</label>
                        
                    <select name="task" class="from-control" id="tasks">
                    <option value="">select task</option></br>

                    <?php
                            require 'connection.php';

                            $sql = mysqli_query( $conn, "SELECT * FROM task");
                            while($row = mysqli_fetch_array($sql))
                            {
                            ?>
                                <option value="<?php echo $row['task_name'];?>"><?php echo $row['task_name'];?></option>;
                            <?php
                            }
                            ?>


                               
                   
                    </select>
                </div>
            
                <div class="from-group"> 
                    
                    <button id="search" class="btn btn-primary">Search</button>
                </div>
              
            </form>
            </div>
    </div></br>
    
    <div id="resultGrid" class="grid-container">
    
    </div>
   
    </body>
</html>
        