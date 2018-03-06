
<?php

require_once 'model/m_facilities.php';

function submit_facilities($name, $description) {

    $controller_result = setfacilities($name, $description);
    return 1;
}

function generate_all_facilities() {

    $result = array();
    $result = getallfacilities();
    return $result;
}

function delete_facility($deactivate) {

    $controller_result = deactivatefacilities($deactivate);
    return 2;
}

function getupdate_facility($update) {
    $result = array();
    $result = getfacilities($id);
    return $result;
}

function submitupdate_facilities($name, $description, $id) {
    $controller_result = updatefacilities($name, $description, $id);
    return 3;
}
