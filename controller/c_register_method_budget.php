
<?php

require_once 'model/m_method_of_receivingfunding.php';

function submit_methodofreceivingfunding($name, $description) {

    $controller_result = setmethodofreceivingfunding($name, $description);

    return 1;
}

function generate_all_methodofreceivingfunding() {

    $result = array();
    $result = getallmethodofreceivingfunding();
    return $result;
}

function delete_methodbudget($deactivate) {

    $controller_result = deactivateregistermethodbudget($deactivate);
    return 2;
}

function getupdate_methodbudget($update) {
    $result = array();
    $result = getmethodofreceivingfundingbyid($update);
    return $result;
}

function submitupdate_methodofreceivingfunding($name, $description, $id) {
    $controller_result = updatemethodofreceivingfunding($name, $description, $id);
    return 3;
}
