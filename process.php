<?php 
    require_once('connection.php');

    if(isset($_POST['btnsubmit']))
    {
        $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
        $Lname = mysqli_real_escape_string($conn,$_POST['Lname']);
        $NIC = mysqli_real_escape_string($conn,$_POST['NIC']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        $query = "SELECT * FROM user WHERE username='$username'";
        
        $result = mysqli_query($conn,$query);

        if(empty($Fname) || empty($Lname) || empty($NIC) || empty($username) || empty($password) || empty($cpassword) )
        {
            header("Location: customer_register.php?error");

        }

        else if(mysqli_num_rows($result) > 0)
        {
            header("Location: customer_register.php?error2");
        }
        
        else if($password != $cpassword)
        {
            header("Location: customer_register.php?error1"); 
        }

        else
        {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql1 = "insert into user (Role,first_name,last_name,NIC,username,password,propic) values ('customer','$Fname','$Lname','$NIC','$username','$pass','$file')";
            $result = mysqli_query($conn,$sql1);

            if($result)
            {
                $user_id=mysqli_insert_id($conn);
                $sql2 = "insert into customers(user_id) values (".$user_id.")";
                $result2 = mysqli_query($conn,$sql2);
                echo 'yes';
            }

            if($result2){
                header('Location: login.php');
            }

            else
            {
                echo 'no';
            }
        }
    }
?>