<?php    
    //include"code.php";

?>

<!DOCTYPE html >
<html>
    <head>
        <title>Login Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>    
    <body style="background-color: #99bee2;">
        <div class="contain row">
            <div class="com-md-6">
            <h3 class="text-center">Login</h3><hr/>    
            <form role="form" action="code.php" method="POST">
                <div class="from-group">
                    <label>Username</label> </br>
                    <input type="text" name="username" class="from-control" placeholder="Enter Username" />
                </div>
                <div class="from-group">
                    <label>Password</label> </br>
                    <input type="password" name="password" class="from-control" placeholder="Enter Password"/>
                </div>
               <p class="text-center" style="color:red;">
                    <?php 
                        if(isset($_GET['error'])==true){echo "invalid username or password";}
                    ?>
                </p>
                <div class="from-group"> 
                    <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>

