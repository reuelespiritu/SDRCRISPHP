<?php

require_once 'model/m_user.php';
require_once 'model/m_project.php';
require_once 'model/m_project_user.php';

function login($email, $password) {
    $passresult = checklogin($email, $password);

    if ($passresult != FALSE) {
        foreach ($passresult as $result) {


            $_SESSION['userid'] = $result['userID'];
            $_SESSION['username'] = $result['email'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            $_SESSION['usertype'] = $result['usertype'];

            if ($_SESSION['usertype'] != 1) {
                $id = $_SESSION['userid'];
                $query_result = getprojectofprojectuser($id);

                if ($query_result != FALSE) {
                    foreach ($query_result as $arr_result) {
                        $_SESSION['project'] = $arr_result['projectID'];
                    }
                }
            }

            header('Location: dashboard.php');
        }
    } else {

        return FALSE;
    }
}

function pass_all_users($id, $username, $firstname, $lastname, $usertype) {

    setsession($id, $email, $firstname, $lastname, $usertype);
}

function submit_userform($firstname, $middlename, $lastname, $email, $password1, $password2, $specializations, $masters, $doctorate) {

    if ($password1 == $password2) {
        $controller_result = setuser($firstname, $middlename, $lastname, $email, $password1, $specializations, $masters, $doctorate);
    } else {
        return 2;
    }
}

?>