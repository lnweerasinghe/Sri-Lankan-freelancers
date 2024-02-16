<?php 
        require_once('connection.php');

        session_start();


    if(isset($_POST['btnsubmit']))
    {
        $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['user_id'];

                    $q2=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val0';");
            $row1=mysqli_fetch_assoc($q2);
            $val4=$row1['contractor_id'];

        $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
        $Lname = mysqli_real_escape_string($conn,$_POST['Lname']);
        $NIC = mysqli_real_escape_string($conn,$_POST['NIC']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
        $district = mysqli_real_escape_string($conn,$_POST['district']);
        $town = mysqli_real_escape_string($conn,$_POST['town']);
        $task = mysqli_real_escape_string($conn,$_POST['task']);
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $file1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
        $file2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
        $file3 = addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));

        $query = "SELECT * FROM user WHERE username='$username' AND username<>'$_SESSION[LoginUser]';";
        
        $result = mysqli_query($conn,$query);

        if(empty($Fname) || empty($Lname) || empty($NIC) || empty($username) )
        {
            header("Location: contractorProfileEdit.php?error4");

        }
        
        else if($password != $cpassword)
        {
            header("Location: contractorProfileEdit.php?error1"); 
        }

        else if(is_numeric($district) && !is_numeric($town))
        {
            header("Location: contractorProfileEdit.php?error5"); 
        }

        else if(mysqli_num_rows($result) > 0)
        {
            header("Location: contractorProfileEdit.php?error2");
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
            
            if((!empty($file1)))
            {
               $sql6 = "UPDATE contractor SET projpic1='$file1' WHERE contractor_id='$val4'";
            
                $result6 = mysqli_query($conn,$sql6);
                 
            }
            
            if((!empty($file2)))
            {
               $sql7 = "UPDATE contractor SET projpic2='$file2' WHERE contractor_id='$val4'";
            
                $result7 = mysqli_query($conn,$sql7);
                 
            }

            if((!empty($file3)))
            {
               $sql8 = "UPDATE contractor SET projpic3='$file3' WHERE contractor_id='$val4'";
            
                $result8= mysqli_query($conn,$sql8);
                  
            }

             
            if((!empty($district)) && (!empty($town)))
            {   
                 $sql5 = "UPDATE contractor SET district='$district',town='$town' WHERE contractor_id='$val4'";
            
                 $result5 = mysqli_query($conn,$sql5);

            }
            

            if((!empty($task))){
                $sql5 = "UPDATE contractor_task SET task_id='$task' WHERE contractor_id='$val4'";
            
                $result5 = mysqli_query($conn,$sql5);
            }
            $sql1 = "UPDATE user SET first_name='$Fname',last_name='$Lname',NIC='$NIC',username='$username' WHERE user_id='$val0'";
            $result1 = mysqli_query($conn,$sql1);

            if($result1){
                header('Location: login.php');
            }


            else
            {
                echo 'no';
            }
        } 
    }
?>