<?php 
    require_once('connection.php');
    session_start();

    
                    

                

    if(isset($_POST['btnsubmit']))
    {
        $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['user_id'];
                   /*  $message = $row['user_id'];
                    echo "<script>alert('$message');</script>";  */

        $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
        $Lname = mysqli_real_escape_string($conn,$_POST['Lname']);
        $NIC = mysqli_real_escape_string($conn,$_POST['NIC']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        $query = "SELECT * FROM user WHERE username='$username' AND username<>'$_SESSION[LoginUser]';";
        
        $result = mysqli_query($conn,$query);

        if(empty($Fname) || empty($Lname) || empty($NIC) || empty($username) )
        {
            header("Location: customerProfileEdit.php?error");

        }
        else if(mysqli_num_rows($result) > 0)
        {
            header("Location: customerProfileEdit.php?error2");
        }
        else
        {
            if(((!empty($password)) && (!empty($cpassword))) && ($password === $cpassword))
            {
                            
                    
                            $pass = password_hash($password, PASSWORD_DEFAULT);
                            $sql3 = "UPDATE user SET password='$pass' WHERE user_id='$val0'";
                            $result2 = mysqli_query($conn,$sql3);
                         
    
            }
            
            if((!empty($file)))
            {
                $sql4 = "UPDATE user SET propic='$file' WHERE user_id='$val0'";
            $result3 = mysqli_query($conn,$sql4);
            }
            
            $sql1 = "UPDATE user SET first_name='$Fname',last_name='$Lname',NIC='$NIC',username='$username' WHERE user_id='$val0'";
            $result1 = mysqli_query($conn,$sql1);


            

            if(($result1 && ((empty($password)) && (empty($cpassword)))) || ($result1 && ($password === $cpassword))){
                header('Location: login.php');
            }

            else
            {
                header("Location: customerProfileEdit.php?error1");
            }
        }
    }
?>