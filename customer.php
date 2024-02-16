<?php

session_start();

include "connection.php";
$_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];



?>

<!DOCTYPE html >
<html lang="en">
    <head>
        <title>customer Page</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <style type="text/css">
            

            .wrapper{
                width: 30%;
                height:450px;
                position:relative; left:350px; top:50px;
                background-color: #f5ff91;
                padding-right: 10px;
                padding-left:  10px;
                overflow:hidden;
                z-index: 100;
            }

            .has-search .form-control {
                padding-left: 2.375rem;
            }
 
            .has-search .form-control-feedback {
                position: absolute;
                z-index: 2;
                display: block;
                width: 2.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;
                pointer-events: none;
                color: #aaa;
                
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
        <a class="nav-link" href="customer_contracts.php">Contracts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Advance_Search.php">Advance Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deleteCustomerAc.php">Delete my account</a>
      </li>
      <li class="nav-item">
                    <button class="nav-link" class="btn btn-primary" style="margin-left:00px; background-color: #2B60DE; border: none; border-radius: 12px;" onclick="window.location='Home.php';" >Logout</button>
      </li>
    </ul>
  </div>
    <form class="form-inline" action="">

        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" id="search" class="form-control" placeholder="Search Contractor's Name">


        </div>
    </nav>
    
            <div class="col-md-5" style="position:absolute ; margin-top:-10px; margin-left:864px; width:400px;  z-index: 100;">
                <div class="list-group" id="show-list" >
                </div>
            </div>

        <script type="text/javascript">
            $(document).ready(function(){
               
                $('#search').keyup(function(){
                    var searchText = $(this).val();
                    if(searchText!=''){
                        $.ajax({
                            url: "search_action.php",
                            method:"POST",
                            data: {query : searchText},

                            success:function(response){
                                $('#show-list').html(response);
                            } 
                        
                        });
                    }
                    else{
                        $('#show-list').html('');
                    }
                });
                $(document).on('click', 'a', function(){
                    $('#search').val($(this).text());
                    $('#show-list').html('');
                    $result = mysqli_query($conn,$query);
                    $row = mysqli_fetch_assoc($result)

                    $_SESSION["LoginUser"] = $row["username"];
                    var url = "contractor.php";
                    $(location).attr('href',url,SESSION);
                            $_SESSION["LoginUser"] = $row["username"];

                            x = $(this).data('value');
                            
                          
                            alert(x);
                            console.log(x);
                            location.replace("contractor.php")
                            window.location.replace("contractor.php");
                           var url = "contractor.php";
                           $(location).attr('href',url);   

                });         
            });

            //Disabling enter key
            $(document).keypress(
                function(event){
                    if (event.which == '13') {
                        event.preventDefault();
                    }
                });
        </script>


  

        

        <div class="container">
            <div class="wrapper">
                <?php
                    $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['propic'];
                    

                ?>
                <h2 style="text-align: center;">profile</h2>
                    <div style="text-align: center;">
                        <h4>
                            <?php echo $_SESSION['LoginUser']; ?>
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

                    echo "<div style=' margin-left: 50px;'>";
                    echo "<table style='margin-top: 40px;'>";
                    
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

                      
                    echo "</table>";
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style='text-align: center;' href='customerProfileEdit.php'>Edit Profile Info<a/>";
                    echo "</div>";

                    

                ?>
            </div>
        </div>

    </body>
</html> 