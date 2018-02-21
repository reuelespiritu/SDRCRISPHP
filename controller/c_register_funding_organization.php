
<?php

require_once 'model/m_funding.php';
require_once 'model/m_funding_organization_type.php';

function submit_fundingorganization($name, $description, $type) {

    $controller_result = setfunding($name, $description, $type);
    echo "<script type='text/javascript'>alert('Funding organization successfully added into the system!');</script>";
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
}

function update_fundingorganization($name, $description, $type, $id) {

    $controller_result = updatefunding($name, $description, $type, $id);
}
