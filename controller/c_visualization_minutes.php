<?php

require_once 'model/m_minutes_meeting.php';

function get_minutes(){
    $result=array();
    $result= getall_minutes();
    return $result;
}
?>
