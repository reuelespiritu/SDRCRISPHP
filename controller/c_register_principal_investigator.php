<?php

require_once 'model/m_user.php';
require_once 'model/m_project.php';
require_once 'functions/emailer.php';

function generate_all_project_withoutpi() {

    $result = array();
    $result = getallprojectswithoutpi();
    return $result;
}

function generate_all_users() {

    $result = array();
    $result = getalluserswithoutusertype();
    return $result;
}

function submit_principal_investigator($project, $researcher) {

    setuser_as_principalinvestigator($researcher);
    $controller_result = setprojectprincipalinvestigator($project, $researcher);

    if ($controller_result = TRUE) {
        sendconfirmation($researcher, $project);
    }
}

function sendconfirmation($researcher, $project) {
    $id = $researcher;
    $result = array();
    $result = getuserbyid($id);

    $result2 = array();
    $result2 = getprojectbyid($id);

    foreach ($result2 as $arr_result) {
        $name = $arr_result['name'];
        $description = $arr_result['description'];
        $startdate = $arr_result['startdate'];
        $enddate = $arr_result['enddate'];
    }

    foreach ($result as $arr_result) {
        $firstname = $arr_result['firstname'];
        $middlename = $arr_result['middlename'];
        $lastname = $arr_result['lastname'];
        $email = $arr_result['email'];
        $usertype = $arr_result['usertype'];
    }

    echo "<script type='text/javascript'>alert('You have successfully made ".$firstname."as a Principal Investigator!');</script>";;

    $subject = "ASSIGNMENT FOR PROJECT AS PRINCIPAL INVESTIGATOR";
    $message = "Good day! <br> $firstname $middlename $lastname <br><br>You have been assigned as the principal investigator for the project: $name  <br> starts on $startdate and ends on $enddate <br><br> Thank you!<br><br>SDRC Research Information System";

    email($email, $subject, $message);
}
