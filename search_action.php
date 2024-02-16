<?php

require_once('connection.php');


if(isset($_POST['query'])){
                        $inputText=$_POST['query'];

                        $query11="SELECT * FROM scarch_result  where first_name LIKE '%$inputText%' OR last_name LIKE '%$inputText%' OR district LIKE '%$inputText%' OR town LIKE '%$inputText%'OR task_name LIKE '%$inputText%' OR CONCAT (task_name,' ',district,' ',town,' ',first_name,' ',last_name) LIKE '%$inputText%'";
                        
                        $result001=$conn->query($query11);
                        if($result001->num_rows>0){
                            while($row111=$result001->fetch_assoc()){

                               

                                if(empty($row111['propic'])){
                                    echo"<a   href='contractor.php?pid={$row111['username']}' class='list-group-item list-group-item-action border-1'  > <div ><div style='float:left;'> <img style='float:right;' class='rounded-circle' class='img-fluid' src='img/pic.jpg' height='80px' width='80px' class='img-thumbnail' /></div>  <div style='margin-left:100px;'> ".$row111['username']." |  ".$row111['task_name']." | ".$row111['district']." | ".$row111['town']." | ".$row111['first_name']."  ".$row111['last_name']."</div></div></a>";
                                }
                                else{
                                    echo"<a href='contractor.php?pid={$row111['username']}' class='list-group-item list-group-item-action border-1'  > <div><div style='float:left;'> <img style='float:right;' class='rounded-circle' class='img-fluid' src='data:image;base64,".base64_encode($row111['propic'])."'  height='80px' width='80px' class='img-thumbnail' /></div >  <div style='margin-left:100px;'> ".$row111['username']." |  ".$row111['task_name']." | ".$row111['district']." | ".$row111['town']." | ".$row111['first_name']."  ".$row111['last_name']."</div></div></a>";   
                                }

                }
                        }
                        else{
                            echo"<a hrif='#' class='list-group-item list-group-item-action border-1'  >no records yet</a>";
                        }
                    }

                    

?>