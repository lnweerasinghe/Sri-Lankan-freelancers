<?php
require_once('connection.php');
session_start();
if(isset($_POST["btn1"]))
{
    $q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                        $row=mysqli_fetch_assoc($q);
                        $val0=$row['user_id'];
    $q1=mysqli_query($conn,"SELECT * FROM contractor where user_id='$val0';");
                        $row1=mysqli_fetch_assoc($q1);
                        $val1=$row1['contractor_id'];
    
    $query1 = "DELETE FROM contractor_task WHERE contractor_id='$val1'";
    $result3 = mysqli_query($conn,$query1);
    if($result3){
        $query2 = "DELETE FROM contract WHERE contractor_id='$val1'";
        $result4 = mysqli_query($conn,$query2);
        if($result4){
            $query3 = "DELETE FROM contractor WHERE user_id='$val0'";
            $result5 = mysqli_query($conn,$query3);
                if ($result5){
                    $query4 = "DELETE FROM user WHERE user_id='$val0'";
                    $result6 = mysqli_query($conn,$query4);
                    if($result6){
                        session_destroy();
                        header('Location:Home.php');
                        }
                } else {
                    echo "no"; 
                }
        }
    }else {
        echo "contractor_task no"; 
    }
}
?>