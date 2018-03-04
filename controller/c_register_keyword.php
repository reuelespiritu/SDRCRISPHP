
<?php

require_once 'model/m_keyword.php';

function submit_keyword($name, $description) {

    $controller_result = setcategoryliterature($name, $description);
    return 1;
}

function generate_all_keyword() {

    $result = array();
    $result = getallkeywords();
    return $result;
}

function delete_keyword($deactivate) {

    $controller_result = deactivatekeyword($deactivate);
    return 2;
}

function getupdate_keyword($update) {
    $result = array();
    $result = getkeyword($update);
    return $result;
}

function submitupdate_keyword($name, $id) {
    $controller_result = updatekeyword($name, $id);
    return 3;
}
