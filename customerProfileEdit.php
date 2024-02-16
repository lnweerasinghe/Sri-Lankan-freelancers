<?php

session_start();

include "connection.php";


?>
<!DOCTYPE html >
<html lang="en">
    <head>
        <title>edit Page</title>
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
                position:relative; left:-35px; top:50px;
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
            
                        .contain{
                margin:auto;
                width:700px;
                border:2px solid gray;
                padding:20px;
                margin-top: 15px;
                background-color:silver ;
                }

            #column2{
                    float:right;
                    margin-right: 90px;
                    }

            #column3{
                    float:right;
                    margin-right: 340px;
                    margin-top: -430px;
                    }

            .form-input input{
                display: none;
            }

            .form-input label{
                width: 100%;
                height: 50PX;
                line-height: 50%;
                text-align: center;
                text-align: justify;
                padding: 12px 10px 5px 10px;
                
                background: #007bff;
                color: #fff;
                font-size: 15px;
                font-family: "Open Sans", sans-serif;
                text-transform: uppercase;
                font-weight: 600;
                border-radius: 10px;
            }

            .preview{
                clip-path: circle();
            }
            
            


        </style>
        
    </head>    
    <body style="background-color: #99bee2;">
                <?php
                    $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['propic'];
                    

                ?>
                <h2 style="text-align: center;">Edit Profile</h2>
                <?php
                    
                ?>
                    <div style="text-align: center;">
                        <h4>
                            <?php echo $_SESSION['LoginUser']; ?>
                        </h4>
                    </div>
                <?php
                    $row1=mysqli_fetch_array($q);                

                ?>

            <div class="contain row">
            <div class="com-md-6">
                
            <form role="form" action="CustomerProfile_edit_process.php" method="POST" enctype="multipart/form-data">
            <div id ="column2" >
                <div class="from-group">
                    <label>First name</label>
                    </br><input type="text" name="Fname" value="<?php echo $row['first_name'] ;?>" class="from-control" placeholder="Enter first name"/>
                </div>
                <div class="from-group">
                     <label>Last name</label>
                </br><input type="text" name="Lname" value="<?php echo $row['last_name'] ;?>" class="from-control" placeholder="Enter last name"/>
                </div>
                <div class="from-group">
                     <label>NIC number</label>
                </br><input type="text" name="NIC" value="<?php echo $row['NIC'] ;?>" class="from-control" placeholder="Enter NIC number"/>
                </div>
                <div class="from-group">
                     <label>Username</label>
                </br><input type="text" name="username" value="<?php  echo $row['username'] ;?>" class="from-control" placeholder="Enter Username"/>
                </div>

                    <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error2'])==true){echo "username alredy taken";}
                        ?>
                    </p>
                <div class="from-group">
                     <label>Password</label>
                </br><input type="password" name="password" class="from-control" placeholder="Enter Password"/>
                </div>
                <div class="from-group">
                    <label>Confirm Password</label>
                </br><input type="password" name="cpassword" class="from-control" placeholder="confirm Password"/>
                </div>

                <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error'])==true){echo "please fill all the First name,</br> Last name,NIC number,Username </br>fields befor submit";}
                        ?>
                    </p>

                    <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error1'])==true){echo "password not matched";}
                        ?>
                    </p>


                <div class="from-group"> 
                    <input type="submit" name="btnsubmit" class="btn btn-primary" value="submit">&nbsp;
                    <input type="reset" name="btnrest" class="btn btn-primary" value="reset">
                </div>
            </div>
                <div id ="column3" >

               <div class="center">
                    <div class="form-input">
                        <label for="image"><h5>upload profile picture</h5></label>
                        <input type="file"  id="image" value=""  name="image" accept="image/*" onchange="previewimage(event)">
                        <div class="preview">
                            <?php if(empty($val0)){
                        
                            echo'<img id="image-preview" class="rounded-circle" class="img-fluid" width="290" height="300" src="img/pic.jpg"/> ';
                        
                            }
                            else{
                                
                                    echo'<img id="image-preview" class="rounded-circle" class="img-fluid" width="290" height="300" src="data:image;base64,'.base64_encode($row['propic']).'"/> ';
                                } ?>
                        </div>
                    </div>
                </div>
                    <script type="text/javascript">
                        function previewimage(event){
                            var reader = new FileReader();
                            var imageField = document.getElementById("image-preview");

                            reader.onload = function(){
                                if(reader.readyState==2){
                                    imageField.src = reader.result;
                                }
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>

                <div>
                    <div id="show_photo"></div>
                </div>

            </div>    
                
            </form>
            </div>
        </div>
        
    </body>
</html> 