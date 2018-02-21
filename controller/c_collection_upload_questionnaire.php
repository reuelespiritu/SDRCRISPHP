<?php

require_once ('model/m_questionnaire.php');

function getallquestionnaires() {
    $result = array();
    $result = getallquestionnaire();
    return $result;
}

function submit_questionnaire($projectID, $questionnaireTitle, $questionnaireObjective, $created, $approved, $AnsweredBy, $AnsweredAge, $AnsweredSex) {
    $controller_result = uploadquestionnaire($projectID, $questionnaireTitle, $questionnaireObjective, $created, $approved, $AnsweredBy, $AnsweredAge, $AnsweredSex);
}

function submit_questionsanddata($data) {
    $fh = fopen($data['tmp_name'], 'r+');
    $questions = fgetcsv($fh);
    $list = explode(',', $questions);

    $line = array();
    while (($row = fgetcsv($fh, 8192)) !== FALSE) {
        $lines[] = $row;
    }

    foreach ($list as $arr_result) {
        $question = $arr_result;
        $controller_result = submit_questions($question);
        echo "$controller_result<br> ";
    }

    foreach ($line as $arr_result1) {
        for ($x = 0; $x < count($list); $x++) {
            $controller_result = uploadquestionnairedata($x+1, $arr_result1);
            echo "$controller_result<br> ";
        }
    }
}
?>

