
<?php

require_once 'model/m_funding.php';
require_once 'model/m_funding_organization_type.php';

function submit_fundingorganization($name, $description, $type) {

    $controller_result = setfunding($name, $description, $type);
   return 1;
   
}

function generate_all_fundingorganization() {

    $result = array();
    $result = getallfundingorganization();
    return $result;
}

function generate_all_fundingorganizationtype() {

    $result = array();
    $result = getallfundingorganizationtype();
    return $result;
}

function delete_fundingorganization($deactivate) {

    $controller_result = deactivatefunding($deactivate);
    return 2;
}

function update_fundingorganization($name, $description, $type, $id) {

    $controller_result = updatefunding($name, $description, $type, $id);
    return 3;
}


function getupdate_fundingorganization($update) {
    $result = array();
    $result = getfundingbyid($update);
    return $result;
}
