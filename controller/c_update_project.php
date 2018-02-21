<?php

require_once 'model/m_project.php';

function submit_projectform($name, $description, $startdate, $enddate, $id) {

    $controller_result = updateproject($name, $description, $startdate, $enddate, $id);
    echo "<script type='text/javascript'>alert('Project Details successfully updated!');</script>";
}

function getprojectinfo($id) {

    $result = array();
    $result = getprojectbyid($id);
    return $result;
}
