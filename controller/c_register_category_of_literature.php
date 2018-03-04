
<?php

require_once 'model/m_category_literature.php';

function submit_categoryliterature($name, $description) {

    $controller_result = setcategoryliterature($name, $description);
    return 1;
}

function generate_all_categoryliterature() {

    $result = array();
    $result = getallcategoryliterature();
    return $result;
}

function delete_categoryliterature($deactivate) {

    $controller_result = deactivatecategoryliterature($deactivate);
    return 2;
}

function getupdate_categoryliterature($update) {
    $result = array();
    $result = getcategoryliterature($update);
    return $result;
}

function submitupdate_categoryliterature($name, $description, $id) {
    $controller_result = updatecategoryliterature($name, $description, $id);
    return 3;
}
