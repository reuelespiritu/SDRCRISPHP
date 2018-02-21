
<?php

require_once 'model/m_funding_organization_type.php';

function submit_fundingorganizationtype($name, $description) {

    $controller_result = setfundingorganizationtype($name, $description);
    echo "<script type='text/javascript'>alert('Input successfully recorded!');</script>";
}

function generate_all_fundingorganizationtype() {

    $result = array();
    $result = getallfundingorganizationtype();
    return $result;
}

function delete_fundingorganizationtype($deactivate) {

    $controller_result = deactivatefundingorganizationtype($deactivate);
}

function getupdate_fundingorganizationtype($update) {
    $result = array();
    $result = getfundingorganizationtype($update);
    return $result;
}

function submitupdate_fundingorganizationtype($name, $description, $id) {
    $controller_result = updatefundingorganizationtype($name, $description, $id);
}
