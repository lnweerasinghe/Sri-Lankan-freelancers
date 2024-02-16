<?php    
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
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>    
    <body style="background-color: #99bee2;">
        <div class="contain row">
            <div class="com-md-6">
            <h3 class="text-center">Delete account</h3><hr/>    
            <form role="form" action="delete_ContractorAccountProcess.php" method="POST">
                
               <p class="text-center" style="color:red;">
               Are you sure you want to delete your account?
                </p>
                <div class="from-group"> 
                    <input type="submit" name="btn1" class="btn btn-primary" value="yes I'm sure"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary"><a href="<?php echo isset($_SESSION['previous_page']) ? $_SESSION['previous_page'] : 'javascript:history.go(-1)'; ?>" style="color: white;">No I'm not</a> </button>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>