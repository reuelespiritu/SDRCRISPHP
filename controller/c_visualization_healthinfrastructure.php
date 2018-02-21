<?php
     
require_once 'model/m_health_infrastructure_damages.php';
function generate_all_healthinfrastructure(){
    
    $result=array();
    $result= getallhealthinfrastructuredamages();
    return $result;
}
