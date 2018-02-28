<?php

function getallfundingorganizationtype(){
    
    
    
         require_once('dbconnect.php');
         
         $query="SELECT * FROM  funding_organization_type WHERE active = 1";
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


function setfundingorganizationtype($name,$description){
      
                       $datenow=date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query="INSERT INTO funding_organization_type (name,description) VALUES ('$name','$description')";
                     $con=createconnection();
                    
                    if (isset($query)){
                    $result=mysqli_query($con,$query);
                    return TRUE;
                            }
$con->close();
    
}


function deactivatefundingorganizationtype($id){
      
    
    require_once('dbconnect.php ');
    $query="UPDATE funding_organization_type SET ACTIVE=0 WHERE fundingorganization_typeID = '$id'";
                     $con=createconnection();
                    
                    if (isset($query)){
                    $result=mysqli_query($con,$query);
                    return TRUE;
                            }
$con->close();
    
}




function getbudgetcategory($id){
    
    
    
         require_once('dbconnect.php');
         
         $query="SELECT * FROM funding_organization_type WHERE active = 1 AND fundingorganization_typeID = '$id'";
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

                               
                                    
function updatebudgetcategory($name,$description,$id)
{


require_once('dbconnect.php');


$query="UPDATE funding_organization_type SET name='$name', description='$description' WHERE fundingorganization_typeID= '$id'";
$con=createconnection();

if (isset($query)){
$result=mysqli_query($con,$query);
return TRUE;
}
$con->close();
}



function getfundingorganizationtype($id){
    
    
    
         require_once('dbconnect.php');
         
         $query="SELECT * FROM funding_organization_type WHERE active = 1 AND fundingorganization_typeID  = '$id'";
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

                               
                                    
function updatefundingorganizationtype($name,$description,$id)
{


require_once('dbconnect.php');


$query="UPDATE funding_organization_type SET name ='$name', description='$description' WHERE fundingorganization_typeID= '$id'";
$con=createconnection();

if (isset($query)){
$result=mysqli_query($con,$query);
return TRUE;
}
$con->close();
}

