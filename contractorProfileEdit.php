<?php
session_start();

include "connection.php";
?>

<!DOCTYPE html>
<html >
    <head>
        <title>Profile edit</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style type="text/css">
                                    .contain{
                                        margin:auto;
                                        width:1200px;
                                        height: 600px;
                                        border:2px solid gray;
                                        padding:20px;
                                        background-color:silver ;
                                        }

                                    #column1{
                                        margin-left: 570px;
                                        margin-right: 320px;
                                        min-height: 330px ;
                                        }

                                    #column2{
                                            margin-left: 880px;
                                            min-height: 330px ;
                                            margin-top: -410px;
                                            }

                                    #column3{
                                            float:left;
                                            margin-left: 115px;
                                            margin-top: -445px;
                                            }

                                            #column4{
                                                float:left;
                                                margin-left: 55px;
                                                margin-top: -90px;
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
        
        <script type="text/javascript">
            $(document).ready(function(){
               
                $('#location').change(function(){
                    var district_id = $(this).val();
                    $.ajax({
                        url: "contractor_reg_process.php",
                        method:"POST",
                        data: {districtid : district_id},

                        success:function(data){
                                $('#town').html(data);
                        } 
                        
                    });
                });            
            });
        </script>
    </head>

    <body style="background-color: #99bee2;">

            <?php
            $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
            $row=mysqli_fetch_assoc($q);
            $val0=$row['propic'];
            $val=$row['user_id'];
            
            $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val';");
            $row1=mysqli_fetch_assoc($q1);
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

        <div class="contain row">
            <div class="com-md-6">
            <h2 style="text-align: center; margin-left: 205px;">Edit Profile</h2><hr/>   
            <form role="form" action="contractorProfile_Edit_process.php" method="POST" enctype="multipart/form-data">
            <div id ="column1" >    
                <div class="from-group">
                    <label>First name</label>
                </br>    <input type="text" value="<?php echo $row['first_name'] ;?>" name="Fname" class="from-control" placeholder="Enter first name"/>
                </div>
                <div class="from-group">
                </br><label>Last name</label>
                </br>   <input value="<?php echo $row['last_name'] ;?>" type="text" name="Lname" class="from-control" placeholder="Enter last name"/>
                </div>
                <div class="from-group">
                </br><label>NIC number</label>
                </br>    <input value="<?php echo $row['NIC'] ;?>" type="text" name="NIC" class="from-control" placeholder="Enter NIC number"/>
                </div>
                <div class="from-group">
                </br><label>Change District</label>
                </br>    <select name="district" class="from-control" id="location" >
                    <option selected="">select your district</option>
                        <?php
                            require 'connection.php';

                            $sql = mysqli_query( $conn, "SELECT * FROM district ORDER BY district");
                            while($row = mysqli_fetch_array($sql))
                            {
                            ?>
                            </br>    <option  value="<?php echo $row['district_id'];?>"><?php echo $row['district'];?></option>;
                            <?php
                            }
                            ?>
                    </select>
                </div>
                <div class="from-group">
                </br><label>Change Town</label>
                <select name="town" type="text" id="town"class="form-control">
                <option value="" selected="selected">select town</option>
                </select>
                </div>
            </div>
            <div id ="column2" >  
                <div class="from-group">
                     <label>Change Task</label>
                        
                </br>    <select name="task" class="from-control" id="tasks">
                    <option value="">select your task</option></br>

                    <?php
                            require 'connection.php';

                            $sql = mysqli_query( $conn, "SELECT * FROM task");
                            while($row = mysqli_fetch_array($sql))
                            {
                            ?>
                            </br>    <option value="<?php echo $row['task_id'];?>"><?php echo $row['task_name'];?></option>;
                            <?php
                            }
                            ?>


                                
                   
                    </select>
                </div><?php
                                 $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                                 $row=mysqli_fetch_assoc($q);
                                ?>
                <div class="from-group">
                </br><label>Username</label>
                </br>    <input value="<?php echo $row['username'] ;?>" type="text" name="username" class="from-control" placeholder="Enter Username"/>
                </div>
                <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error2'])==true){echo "username alredy taken";}
                        ?>
                    </p>
                <div class="from-group">
                    <label>Password</label>
                </br>    <input type="password" name="password" class="from-control" placeholder="Enter Password"/>
                </div>
                <div class="from-group">
                </br><label>Confirm Password</label>
                </br>    <input type="password" name="cpassword" class="from-control" placeholder="confirm Password"/>
                </div>

                <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error4'])==true){echo "please fill all the First name, Last name,NIC number,Username fields befor submit";}
                        ?>
                    </p>

                    <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error1'])==true){echo "password not matched";}
                        ?>
                    </p>

                    <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error5'])==true){echo "If you change the District then select the town according to that District";}
                        ?>
                    </p>
            
                <div class="from-group"> 
                    <input type="submit" name="btnsubmit" class="btn btn-primary" value="submit" />&nbsp;
                    <input type="reset" name="btnrest" class="btn btn-primary" value="reset" />
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

            </div>
            <div id ="column4" >
                
                            <label ><h5>Change your project images</h5></label>
                                <br/>   <?php
                        $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                        $row=mysqli_fetch_assoc($q);
                        $val=$row['user_id'];
                        
                        $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val';");
                        $row1=mysqli_fetch_assoc($q1);

                    if(empty($row1['projpic1'])){
                        echo"<img src='img/pic.jpg' onclick='triggerClick()' id='display1' width='150' height='170'>&nbsp";
                        echo"<label for='image1'> </label>";
                        echo"<input type='file' name='image1' id='image1' class='image1' style='display:none;' onchange='displayImage(this);'accept='image/jpeg, image/jpg'>";
                       
                    }
                    else{
                        echo"<img src='data:image;base64,".base64_encode($row1['projpic1'])."' onclick='triggerClick()' id='display1' width='150' height='170'> ";
                        echo"<label for='image1'> </label>";
                        echo"<input type='file' name='image1' id='image1' class='image1' style='display:none;' onchange='displayImage(this);'accept='image/jpeg, image/jpg'>";
                        
                    }
                    if(empty($row1['projpic2'])){
                        echo"<img src='img/pic.jpg' onclick='triggerClick1()' id='display2' width='150' height='170'>&nbsp";
                        echo"<label for='image1'> </label>";
                        echo"<input type='file' name='image2' id='image2' class='image2' style='display:none;' onchange='displayImage1(this);'accept='image/jpeg, image/jpg'>";
                       
                    }
                    else{
                        echo"<img src='data:image;base64,".base64_encode($row1['projpic2'])."' onclick='triggerClick1()' id='display2' width='150' height='170'> ";
                        echo"<label for='image1'> </label>";
                        echo"<input type='file' name='image2' id='image2' class='image2' style='display:none;' onchange='displayImage1(this);'accept='image/jpeg, image/jpg'>";
                        
                    }
                    if(empty($row1['projpic3'])){
                        echo"<img src='img/pic.jpg' onclick='triggerClick2()' id='display3' width='150' height='170'>&nbsp";
                        echo"<label for='image2'> </label>";
                        echo"<input type='file' name='image3' id='image3' class='image3' style='display:none;' onchange='displayImage2(this);'accept='image/jpeg, image/jpg'>";
                       
                    }
                    else{
                        echo"<img src='data:image;base64,".base64_encode($row1['projpic3'])."' onclick='triggerClick2()' id='display3' width='150' height='170'> ";
                        echo"<label for='image2'> </label>";
                        echo"<input type='file' name='image3' id='image3' class='image3' style='display:none;' onchange='displayImage2(this);'accept='image/jpeg, image/jpg'>";
                        
                    }
                    
                    ?>
                                        <script type="text/javascript">

                                        function triggerClick(){

                                            document.querySelector('#image1').click();

                                        }

                                        function displayImage(e){
                                            if(e.files[0]){
                                            var reader3 = new FileReader();
                                            var imageField3 = document.getElementById("display1");

                                            reader3.onload = function(e){
                                                document.querySelector('#display1').setAttribute('src', e.target.result);
                                                if(reader3.readyState==2){
                                                    imageField3.src = reader3.result;
                                                }
                                            }
                                            reader3.readAsDataURL(e.files[0]);
                                            }
                                        }

                                        function triggerClick1(){

                                            document.querySelector('#image2').click();

                                        }

                                        function displayImage1(e){
                                            if(e.files[0]){
                                            var reader1 = new FileReader();
                                            var imageField1 = document.getElementById("display2");

                                            reader1.onload = function(e){
                                                document.querySelector('#display2').setAttribute('src', e.target.result);
                                                if(reader1.readyState==2){
                                                    imageField1.src = reader1.result;
                                                }
                                            }
                                            reader1.readAsDataURL(e.files[0]);
                                            }
                                        }

                                        function triggerClick2(){

                                            document.querySelector('#image3').click();

                                        }

                                        function displayImage2(e){
                                            if(e.files[0]){
                                            var reader2 = new FileReader();
                                            var imageField2 = document.getElementById("display3");

                                            reader2.onload = function(e){
                                                document.querySelector('#display3').setAttribute('src', e.target.result);
                                                if(reader2.readyState==2){
                                                    imageField2.src = reader2.result;
                                                }
                                            }
                                            reader2.readAsDataURL(e.files[0]);
                                            }
                                        }
                                        </script>

                                    

                                </div>     
            </form>
            </div>
        </div>
    </body>
</html>
                  