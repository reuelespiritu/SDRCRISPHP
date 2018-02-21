<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('model/m_project.php');
require_once ('model/m_project_file.php');

function select_a_project($id) {

    $result = array();
    $result = getprojectbyid($id);
    return $result;
}

function select_project_byuser($id) {

    $result = array();
    $result = getprojectwithpi($id);
    return $result;
}

function submit_project_data($projectid, $filename, $fileproperties, $data) {

    $controller_result = setprojectdata($projectid, $filename, $fileproperties, $data);
     echo "<script type='text/javascript'>alert('File successfully uploaded!');</script>";
}

function generateprojectdata($id) {

    $result = array();
    $result = getprojectdatabyprojectid($id);
    return $result;
}
