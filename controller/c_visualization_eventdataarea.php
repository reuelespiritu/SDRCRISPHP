<?php
     
require_once 'model/m_event_data_per_area.php';
function generate_all_eventdataarea(){
    
    $result=array();
    $result= getalleventdata_area();
    return $result;
}
