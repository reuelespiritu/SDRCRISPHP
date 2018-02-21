<?php

function getallmethodofexpense(){
    
    
    
         require_once('dbconnect.php');
         
         $query="SELECT * FROM  method_of_expense WHERE active = 1";
         $con=createconnection();
                    
                    if (isset($query)){
                    $result=mysqli_query($con,$query);
                                
                                
                         $num_rows = mysqli_num_rows($result);
                                $query_result=array();

                               if($num_rows> 0) 
                                   
                               {
                                   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                      $query_result[]=$row;
                                       }
                                    return $query_result;
                                  
                                   }
                                      
                                    else{
                                        return FALSE;
                                        }
                    }
                            $con->close();
    
}


function setmethodofexpense($name,$description){
      
                       $datenow=date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query="INSERT INTO method_of_expense (name,description) VALUES ('$name','$description')";
                     $con=createconnection();
                    
                    if (isset($query)){
                    $result=mysqli_query($con,$query);
                    return TRUE;
                            }
$con->close();
    
}



function deactivatemethodofexpense($id){
      
    require_once('dbconnect.php');
    $query="UPDATE method_of_expense SET ACTIVE=0 WHERE expensemethodID = '$id'";
                     $con=createconnection();
                    
                    if (isset($query)){
                    $result=mysqli_query($con,$query);
                    return TRUE;
                            }
$con->close();
    
}

function getmethodofexpensebyid($id){
    
    
    
         require_once('dbconnect.php');
         
         $query="SELECT * FROM  method_of_expense WHERE active = 1 AND expensemethodID = '$id'";
         $con=createconnection();
                    
                    if (isset($query)){
                    $result=mysqli_query($con,$query);
                                
                                
                         $num_rows = mysqli_num_rows($result);
                                $query_result=array();

                               if($num_rows> 0) 
                                   
                               {
                                   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                      $query_result[]=$row;
                                       }
                                    return $query_result;
                                  
                                   }
                                      
                                    else{
                                        return FALSE;
                                        }
                    }
                            $con->close();
    
}

                               
                                    
function updatemethodofexpense($name,$description,$id)
{


require_once('dbconnect.php');


$query="UPDATE method_of_expense SET name='$name', description='$description' WHERE expensemethodID = '$id'";
$con=createconnection();

if (isset($query)){
$result=mysqli_query($con,$query);
return TRUE;
}
$con->close();
}




