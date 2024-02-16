<?php


session_start();
require_once "connection.php";


$role="";
if(isset($_POST["btnLogin"]))
{
    
    $username = $_POST['username'];
    $password = $_POST["password"];

   
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn,$query);
    if ($result) {
        $user_data = mysqli_fetch_assoc($result);

        // Check if a matching user was found
        
            // Verify the entered password with the stored hashed password
            $hashedPasswordFromDatabase = $user_data['password'];
            
            if(password_verify($password,$hashedPasswordFromDatabase)) {
               
                        if($user_data['Role'] == "customer")
                        {
                                $_SESSION['LoginUser'] = $user_data['username'];
                                $_SESSION['role'] = $user_data['Role'];
                                header('Location: customer.php');
                            }
                        else if ($user_data['Role'] == "contractor")
                        {
                                $_SESSION['LoginUser'] = $user_data['username'];
                                $_SESSION['role'] = $user_data['Role'];
                                header('Location: contractor_prof.php');
                        }

          
          
        
            } else {
                
                header("Location: login.php?error");
                
            }
        
    }
}

?>