<!DOCTYPE html>
<html>
    <head>
        <title>register page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="register.css">
    </head>

    <body>
        <div class="contain row">
            <div class="com-md-6">
            <h3 class="text-center">Customer Register</h3><hr/>    
            <form role="form" action="process.php" method="POST" enctype="multipart/form-data">
            <div id ="column2" >
                <div class="from-group">
                    <label>First name</label>
                    </br><input type="text" name="Fname" class="from-control" placeholder="Enter first name"/>
                </div>
                <div class="from-group">
                     <label>Last name</label>
                </br><input type="text" name="Lname" class="from-control" placeholder="Enter last name"/>
                </div>
                <div class="from-group">
                     <label>NIC number</label>
                </br><input type="text" name="NIC" class="from-control" placeholder="Enter NIC number"/>
                </div>
                <div class="from-group">
                     <label>Username</label>
                </br><input type="text" name="username" class="from-control" placeholder="Enter Username"/>
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

                </br><p class="text-center" style="color:red;">
                        <?php 
                        if(isset($_GET['error'])==true){echo "please fill empty fields";}
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
                        <input type="file" id="image"  name="image" accept="image/*" onchange="previewimage(event)">
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

                <div>
                    <div id="show_photo"></div>
                </div>

            </div>    
                
            </form>
            </div>
        </div>
    </body>
</html>