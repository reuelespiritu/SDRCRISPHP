<?php
     
require_once 'model/m_event_data_per_region.php';
function generate_all_eventdataregion(){
    
    $result=array();
    $result= getalleventdata_region();
    return $result;
}
