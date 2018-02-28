<?php
     
require_once 'model/m_health_data.php';
function generate_all_healthdata(){
    
    $result=array();
    $result= getallhealthdata();
    return $result;
}
