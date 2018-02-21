<?php
     
require_once 'model/m_rrl.php';
function generate_all_literature_listings(){
    
    $result=array();
    $result= getallrrl();
    return $result;
}
