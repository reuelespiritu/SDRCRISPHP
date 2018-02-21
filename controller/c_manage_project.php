<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('model/m_project.php');
function generate_all_projects(){
    
    $result=array();
    $result= getallprojects();
    return $result;
}

function delete_project($deactivate){
    
    $controller_result=deactivateproject($deactivate);
}