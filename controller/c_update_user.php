<?php


require_once 'model/m_user.php';

function submit_userform($firstname,$middlename,$lastname,$email,$password1,$password2,$specializations,$masters,$doctorate,$id){
    
    if ($password1==$password2){
        $controller_result=updateuser($firstname,$middlename,$lastname,$email,$password1,$specializations,$masters,$doctorate,$id);
    }
    else
    {return 2;}
        }
        
function getuserinfo($id){

       $result=array();
       $result=getuserbyid($id);
       return $result;
   }

