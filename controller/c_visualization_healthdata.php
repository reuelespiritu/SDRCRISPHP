<?php
     
require_once 'model/m_health_data.php';
function generate_all_healthdata(){
    
    $result=array();
    $result= getallhealth_data();
    return $result;
}
