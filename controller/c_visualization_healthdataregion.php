<?php
     
require_once 'model/m_health_data_per_region.php';
function generate_all_healthdataregion(){
    
    $result=array();
    $result= getallhealthdata_region();
    return $result;
}
