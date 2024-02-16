<?php
require_once('connection.php');
session_start();
if(isset($_POST["btnLogin"]))
{
$q=mysqli_query($conn,"SELECT * FROM user where username='$_SESSION[LoginUser]';");
                    $row=mysqli_fetch_assoc($q);
                    $val0=$row['user_id'];
$query = "DELETE FROM customers WHERE user_id='$val0'";
$result = mysqli_query($conn,$query);
if ($result){
    $query1 = "DELETE FROM user WHERE user_id='$val0'";
    $result2 = mysqli_query($conn,$query1);
if($result2){session_destroy();
    header('Location:Home.php');
    }
} else {
    echo "no"; 
}
}
?>
