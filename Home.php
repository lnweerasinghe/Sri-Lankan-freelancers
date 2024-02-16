<!DOCTYPE html >
<html>
    <head>
        <title>Login Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <style type="text/css" >
                    ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    overflow: hidden;
                    background-color: #2B60DE;
                    }

                    li {
                    float: left;
                    }

                    li a, .dropbtn {
                    display: inline-block;
                    color: white;
                    text-align: center;
                    padding: 14px 16px;
                    text-decoration: none;
                    cursor: pointer;
                    }

                    li a:hover, .dropdown:hover .dropbtn {
                    background-color: red;
                    }

                    li.dropdown {
                    display: inline-block;
                    }

                    .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                    }

                    .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                    text-align: left;
                    }

                    .dropdown-content a:hover {background-color: #f1f1f1;}

                    .dropdown:hover .dropdown-content {
                    display: block;
                    }
                    .topnav #dropbtn{
                    display: none;
                    }

                        /* trans box */
                        div.background1 {
                            background: url(img/customer.jpg) repeat;
                            border: 2px solid black;
                            background-size: cover;
                            width:670px; 
                            height:400px;
                            opacity: 0.9;
                            }
                            
                        div.background {
                            background: url(img/contractor.jpg) repeat;
                            border: 2px solid black;
                            background-size: cover;
                            width:670px; 
                            height:400px;
                            opacity: 0.9;
                            }
                        div.transbox {
                            margin-top: 150px;    
                            margin-right: 30px;  
                            margin-bottom: 200px;
                            margin-left: 50px;
                            text-align: center; 
                            background-color: #ffffff;
                            border: 1px solid black;
                            opacity: 0.6;
                        }
 
                        div.transbox p {
                        margin: 5%;
                        font-weight: bold;
                        color: #000000;
                        } 
                    </style>
    </head>    
    <body style="background-color:#6698FF;">
       
            <div class="com-md-6">
                <div >
            <h3 class="text-center" style="font-size:25px; font-family:Times New Roman; margin-left: 550px;">Sri Lankan freelancer</h3>   
                </div>
                                    <ul>
                        
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn" ><i class="fa fa-bars" style="font-size:18px"></i></a>
                            <div class="dropdown-content">
                            <a href="#">About us</a>
                            <a href="#">How to use</a>
                            
                            </div>
                        </li>
                        <li><a href="login.php">
                            Login
                        </a></li>
                        </ul>

                        <h3 style="text-align:center;">Notice: you must be registered to receive a service.</h3>
                       <div class="" id ="column1"  style=" width:600px;"  >
                       <a href="contractor_register.php">
                       <div class="background" >
                       
                            <div class="transbox">
                            <p>Click here to register if you are a contractor</p>
                            </div>
                            
                            </div>
                            </a>
                        </div>
                        
                        <div class="" id ="column2"  style="margin-left: 673px; width:600px; margin-top:-404px;">
                       <a href="customer_register.php">
                       <div class="background1" >
                            <div class="transbox">
                            <p>Click here to register if you are a customer</p>
                           </div>
                            
                            </div>
                            </a>
                        </div>

            </div>
        
    </body>
</html>

