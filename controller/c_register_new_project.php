<?php

require_once 'model/m_project.php';
require_once 'model/m_funding.php';

function submit_projectform($name, $description, $startdate, $enddate, $fundingorganization) {

    $controller_result = setproject($name, $description, $startdate, $enddate, $fundingorganization);
    echo "<script type='text/javascript'>alert('Project successfully registered in the system!');</script>";
}

function generate_all_fundingorganization() {
    $result = array();
    $result = getallfundingorganization();
    return $result;
}
