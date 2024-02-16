<?php
//session_start();
//$conn = mysqli_connect("localhost","root","","contractors");

?>

<!DOCTYPE html>
<html >
    <head>
       
        <title>register page</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="">

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
        margin-top: -480px;
        }

        #column4{
            float:left;
            margin-left: 55px;
            margin-top: -110px;
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

    <body>
        <div class="contain row">
            <div class="com-md-6">
            <h3 class="text-center" style="margin-left: 205px; "> Contractor Register</h3><hr/>    
            <form role="form" action="contractor_reg_process.php" method="POST" enctype="multipart/form-data">
            <div id ="column1" >    
                <div class="from-group">
                    <label>First name</label>
                </br>    <input type="text" name="Fname" class="from-control" placeholder="Enter first name"/>
                </div>
                <div class="from-group">
                </br><label>Last name</label>
                </br>   <input type="text" name="Lname" class="from-control" placeholder="Enter last name"/>
                </div>
                <div class="from-group">
                </br><label>NIC number</label>
                </br>    <input type="text" name="NIC" class="from-control" placeholder="Enter NIC number"/>
                </div>
                <div class="from-group">
                </br><label>District</label>
                </br>    <select name="district" class="from-control" id="location" >
                    <option selected="">select your district</option>
                        <?php
                            require 'connection.php';

                            $sql = mysqli_query( $conn, "SELECT * FROM district ORDER BY district");
                            while($row = mysqli_fetch_array($sql))
                            {
                            ?>
                            </br>    <option value="<?php echo $row['district_id'];?>"><?php echo $row['district'];?></option>;
                            <?php
                            }
                            ?>
                    </select>
                </div>
                <div class="from-group">
                </br><label>Town</label>
                <select name="town" type="text" id="town"class="form-control">
                <option value="" selected="selected">select town</option>
                </select>
                </div>
            </div>
            <div id ="column2" >  
                <div class="from-group">
                     <label>Task</label>
                        
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
                </div>
                <div class="from-group">
                </br><label>Username</label>
                </br>    <input type="text" name="username" class="from-control" placeholder="Enter Username"/>
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

                </br><p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error4'])==true){echo "please fill empty fields";}
                        ?>
                    </p>

                    <p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error1'])==true){echo "password not matched";}
                        ?>
                    </p>
            
                <div class="from-group"> 
                    <input type="submit" name="btnsubmit" class="btn btn-primary" value="submit" />&nbsp;
                    <input type="reset" name="btnrest" class="btn btn-primary" value="reset" />
                </div>
            </div>
            <div id ="column3" >

            <br/>   <div class="center">
                        <div class="form-input">
                   
                            <label for="image"><h5>upload profile picture</h5></label>
                            <input type="file"  name="image" id="image"  accept="image/*" onchange="previewimage(event)" accept="image/jpeg, image/jpg" />
                            <div class="preview">
                                <img src="img/pic.jpg" id="image-preview" width="290" height="300" >
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
            <br/>    <div class="">
                            <div id ="column4" >
                            <label ><h5>upload your project images</h5></label>
                                <br/>   <img src="img/pic.jpg" onclick="triggerClick()" id="display3" width="150" height="170"> 
                                <label for="file"> </label>
                                <input type="file" name="image3" id="image3" class="image3" style="display:none;" onchange="displayImage(this);"accept="image/jpeg, image/jpg"> 
                                

                                <img src="img/pic.jpg" onclick="triggerClick1()" id="display1" width="150" height="170"> 
                                <label for="image1"> </label>
                                <input type="file" name="image1" id="image1" style="display:none; " onchange="displayImage1(this);" accept="image/jpeg, image/jpg">

                                <img src="img/pic.jpg" onclick="triggerClick2()" id="display2" width="150" height="170"> 
                                <label for="image2"> </label>
                                <input type="file" name="image2" id="image2" style="display:none; " onchange="displayImage2(this);" accept="image/jpeg, image/jpg">
                                    
                                        <script type="text/javascript">

                                        function triggerClick(){

                                            document.querySelector('#image3').click();

                                        }

                                        function displayImage(e){
                                            if(e.files[0]){
                                            var reader3 = new FileReader();
                                            var imageField3 = document.getElementById("display3");

                                            reader3.onload = function(e){
                                                document.querySelector('#display3').setAttribute('src', e.target.result);
                                                if(reader3.readyState==2){
                                                    imageField3.src = reader3.result;
                                                }
                                            }
                                            reader3.readAsDataURL(e.files[0]);
                                            }
                                        }

                                        function triggerClick1(){

                                            document.querySelector('#image1').click();

                                        }

                                        function displayImage1(e){
                                            if(e.files[0]){
                                            var reader1 = new FileReader();
                                            var imageField1 = document.getElementById("display1");

                                            reader1.onload = function(e){
                                                document.querySelector('#display1').setAttribute('src', e.target.result);
                                                if(reader1.readyState==2){
                                                    imageField1.src = reader1.result;
                                                }
                                            }
                                            reader1.readAsDataURL(e.files[0]);
                                            }
                                        }

                                        function triggerClick2(){

                                            document.querySelector('#image2').click();

                                        }

                                        function displayImage2(e){
                                            if(e.files[0]){
                                            var reader2 = new FileReader();
                                            var imageField2 = document.getElementById("display2");

                                            reader2.onload = function(e){
                                                document.querySelector('#display2').setAttribute('src', e.target.result);
                                                if(reader2.readyState==2){
                                                    imageField2.src = reader2.result;
                                                }
                                            }
                                            reader2.readAsDataURL(e.files[0]);
                                            }
                                        }
                                        </script>

                                    

                                </div> 
                                </div>                   
            </form>
            </div>
        </div>
    </body>
</html>
                  