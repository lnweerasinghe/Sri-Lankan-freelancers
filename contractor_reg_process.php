<?php 
        require_once('connection.php');

        $output='';
        $sql4 ="SELECT * FROM town WHERE district_id ='".$_POST['districtid']."'  ORDER BY town" ;
        $result = mysqli_query($conn, $sql4);
        $output = '<select name="town" class="from-control"> <option value="town"> select town </option></select>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["town_id"].'"> '.$row["town"].'</option>';
    
    } 
    
        echo $output;


    
    if(isset($_POST['btnsubmit']))
    {

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

        $query = "SELECT * FROM user WHERE username='$username'";
        
        $result = mysqli_query($conn,$query);

        if(empty($Fname) || empty($Lname) || empty($NIC) || empty($username) || empty($password) || empty($cpassword) || empty($district) || empty($town) || empty($task))
        {
            header("Location: contractor_register.php?error4");

        }

        else if(mysqli_num_rows($result) > 0)
        {
            header("Location: contractor_register.php?error2");
        }
        
        else if($password != $cpassword)
        {
            header("Location: contractor_register.php?error1"); 
        }

        else
        {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql1 = "insert into user (Role,first_name,last_name,NIC,username,password,propic) values ('contractor','$Fname','$Lname','$NIC','$username','$pass','$file')";
            $result4 = mysqli_query($conn,$sql1);

            if($result4)
            {
                $user_id=mysqli_insert_id($conn);
                $sql2 = "insert into contractor(district,town,user_id,projpic1,projpic2,projpic3) values ('$district','$town',".$user_id.",'$file1','$file2','$file3')";
                $result2 = mysqli_query($conn,$sql2);
                echo 'yes';

            }
            

            if($result2){

                $contractor_id=mysqli_insert_id($conn);
                $sql5 = "insert into contractor_task(contractor_id,task_id) values(".$contractor_id.",'$task')";
                $result3 = mysqli_query($conn,$sql5);
                
            }

            if($result3){
                header('Location: login.php');
            }


            else
            {
                echo 'no';
            }
        }
    }
?>
