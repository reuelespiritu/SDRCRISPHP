
<?php

require_once 'model/m_type_of_literature.php';

function submit_typeofliterature($name, $description) {

    $controller_result = settypeofliterature($name, $description);
    return 1;
}

function generate_all_typeofliterature() {

    $result = array();
    $result = getalltypeofliterature();
    return $result;
}

function delete_typeofliterature($deactivate) {

    $controller_result = deactivatetypeofliterature($deactivate);
    return 2;
}

function getupdate_typeofliterature($update) {
    $result = array();
    $result = gettypeofliterature($update);
    return $result;
}

function submitupdate_typeofliterature($name, $description, $id) {
    $controller_result = updatetypeofliterature($name, $description, $id);
    return 3;
}
