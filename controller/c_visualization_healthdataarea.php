<?php
     
require_once 'model/m_health_data_per_area.php';
function generate_all_healthdataarea(){
    
    $result=array();
    $result= getallhealthdata_area();
    return $result;
}
