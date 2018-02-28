<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('model/m_rrl.php');
require_once ('model/m_project_user.php');

function generate_all_rrl() {
    $result = array();
    $result = getallrrl();
    return $result;
}

function submit_literatureupload($projectid, $data, $userid) {
    if ($data['type'] == "application/vnd.ms-excel") {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }
        $x = 0;
        $checker = array();
        $arr_content = array();
        foreach ($lines as $arr_result) {
            $year = $arr_result[0];
            if ($year == NULL || $year < 0) {
                array_push($checker, $x);
            }
            $title = $arr_result[1];
            if ($title == NULL || !is_string($title)) {
                array_push($checker, $x);
            }
            $author = $arr_result[2];
            if ($author == NULL || !is_string($author)) {
                array_push($checker, $x);
            }
            $abstract = $arr_result[3];
            if ($abstract == NULL || !is_string($abstract)) {

                array_push($checker, $x);
            }
            $typeID = $arr_result[4];
            if ($typeID == "Grey") {
                $typeID = 1;
            } else if ($typeID == "Scientific") {
                $typeID = 2;
            } else {
                $typeID = 0;
            }
            $categoryID = $arr_result[5];
            if ($categoryID == "News Article") {
                $categoryID = 1;
            } else if ($categoryID == "Conference Papers") {
                $categoryID = 2;
            } else {
                $categoryID = 0;
            }
            if ($typeID <= 0) {

                array_push($checker, $x);
            }
            if ($categoryID <= 0) {

                array_push($checker, $x);
            }

            $source = $arr_result[6];
            if ($source == NULL || !is_string($source)) {

                array_push($checker, $x);
            }
            $keywords = $arr_result[7];
            if ($keywords == NULL || !is_string($keywords)) {

                array_push($checker, $x);
            }
            $link = $arr_result[8];
            if ($link == NULL || !is_string($link)) {

                array_push($checker, $x);
            }
            $projectID = $projectid;
            $userID = $userid;

            $x++;
//
//                    $newdata =  array (
//      'year' => 'test',
//      'title' => 'test',
//      'author' => 'test'
//      'author' => 'test'
//      'author' => 'test'
//    );
//            array_push($arr_content, );
//            
//        }
//        if ($checker != NULL) {
//            return $arr_content;
//        }
 uploadliterature($projectID, $year, $title, $author, $abstract, $typeID, $categoryID, $source, $keywords, $link, $userID);
           
    }
    
            } else {
            echo "<script type='text/javascript'>alert('Please Upload a .csv file!');></script>";
        }
         header('Location: visualization_listings_literature.php');
    }

function submit_form_literatureupload($projectID, $year, $title, $author, $abstract, $typeID, $categoryID, $source, $keywords, $link, $userID) {


    $typeID = trim($typeID);
    $categoryID = trim($categoryID);
    if (strcmp($typeID, "Grey") == 0) {
        $typeID = 1;
    } else if (strcmp($typeID, "Scientific") == 0) {
        $typeID = 2;
    }
    if (strcmp($categoryID, "News Articles") == 0) {
        $categoryID = 1;
    } else if (strcmp($categoryID, "Conference Papers") == 0) {
        $categoryID = 2;
    }

    $controller_result = uploadliterature($projectID, $year, $title, $author, $abstract, $typeID, $categoryID, $source, $keywords, $link, $userID);
    echo "<script type='text/javascript'>alert('Review of Related Literature material details successfully uploaded!');</script>";

    header('Location: visualization_listings_literature.php');
}

function deactivat_errl($rrlID) {
    $controller_result = deactivaterrl($rrlID);
}
