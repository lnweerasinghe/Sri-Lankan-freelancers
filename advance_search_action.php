<?php
 error_reporting(0);
 
 require_once('connection.php');

$value1 = $_POST['location'];
$value2 = $_POST['town'];
$value3 = $_POST['tasks'];

$query11="SELECT * FROM scarch_result  where district='$value1' AND town='$value2'AND task_name='$value3' ";
                        
                        
                        $result001=$conn->query($query11);
                        if($result001->num_rows>0){
                            while($row111=$result001->fetch_assoc()){

                               

                                if(empty($row111['propic'])){
                                    echo"<div  id='resultGrid'><div class='result-box'><a   href='contractor.php?pid={$row111['username']}' class='list-group-item list-group-item-action border-1'  > <div > <img  class='result-image' class='img-fluid' src='img/pic.jpg' height='80px' width='80px' class='img-thumbnail' /></div>  <div class='result-description'> ".$row111['username']." |  ".$row111['task_name']." | ".$row111['district']." | ".$row111['town']." | ".$row111['first_name']."  ".$row111['last_name']."</div></a></div></div>";
                                   
                                }
                                else{
                                    echo"<div  id='resultGrid'><div class='result-box'><a   href='contractor.php?pid={$row111['username']}' class='list-group-item list-group-item-action border-1'  > <div > <img  class='result-image' class='img-fluid' src='data:image;base64,".base64_encode($row111['propic'])."' height='80px' width='80px' class='img-thumbnail' /></div>  <div class='result-description'> ".$row111['username']." |  ".$row111['task_name']." | ".$row111['district']." | ".$row111['town']." | ".$row111['first_name']."  ".$row111['last_name']."</div></a></div></div>";
                                }
                               
                               

                }
                        }
                        else{
                            echo"<a hrif='#' class='list-group-item list-group-item-action border-1'  >no records yet</a>";
                        }
                    


if($_POST["action"] == "action")
	{
        $output='';
        $sql4 ="SELECT T.*,D.* FROM district D JOIN town T ON T.district_id=D.district_id WHERE district='".$_POST['districtid']."'  ORDER BY town" ;
        
        $result = mysqli_query($conn, $sql4);
        $output = '<select name="town" class="from-control"> <option value="town"> select town </option></select>';
            while($row = mysqli_fetch_array($result))
        {
        $output .= '<option value="'.$row["town"].'"> '.$row["town"].'</option>';

        } 

        echo $output;
    }
?>
