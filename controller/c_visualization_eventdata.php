<?php
     
require_once 'model/m_event_data.php';
function generate_all_eventdata(){
    
    $result=array();
    $result= getalleventdata();
    return $result;
}
