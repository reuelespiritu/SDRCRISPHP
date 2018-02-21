<?php


require_once ('model/m_user.php');
function generate_all_users(){
    
    $result=array();
    $result= getallusers();
    return $result;
}

function delete_user($deactivate){
        $controller_result=deactivateuser($deactivate);
}
