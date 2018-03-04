<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('model/m_rrl.php');
require_once ('model/m_project_user.php');
require_once ('model/m_keyword.php');
require_once ('model/m_rrl_keyword.php');
require_once ('model/m_category_literature.php');
require_once ('model/m_type_of_literature.php');
require_once ('model/m_project_user.php');
require_once ('model/m_project_user.php');

function generate_all_rrl() {
    $result = array();
    $result = getallrrl();
    return $result;
}

function submit_literatureupload($projectid, $data, $userid) {
    $fh = fopen($data['tmp_name'], 'r+');
    $lines = array();


    while (($row = fgetcsv($fh, 8192)) !== FALSE) {
        $lines[] = $row;
    }
    $x = 0;
    $checker = array();
    $arr_content = array();
    $keywordsarray = array();




    foreach ($lines as $arr_result) {

        if ($x > 0) {
            $y = 0;

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

//Type ID
            $type = $arr_result[4];
            $typeID = comparetypeoflit($type);

            if ($typeID <= 0) {

                array_push($checker, $x);
            }


//Category ID 
            $category = $arr_result[5];
            $categoryID = comparecategory($category);

            if ($categoryID <= 0) {

                array_push($checker, $x);
            }


            $source = $arr_result[6];
            if ($source == NULL || !is_string($source)) {

                array_push($checker, $x);
            }


            $keywords = $arr_result[7];
            $kwarray = (explode(',', $keywords));


            $temparray = array();

            foreach ($kwarray as $kw) {

                array_push($temparray, $kw[$y]);
                $y++;
            }
            array_push($keywordsarray, $temparray);

            $link = $arr_result[8];
            if ($link == NULL || !is_string($link)) {

                array_push($checker, $x);
            }

            $projectID = $projectid;
            $userID = $userid;




            $newdata = array(
                'year' => $year,
                'title' => $title,
                'author' => $author,
                'abstract' => $abstract,
                'typeoflit' => $typeID,
                'category' => $categoryID,
                'source' => $source,
                'inputtedby' => $userID,
                'project' => $projectID,
                'link' => $link
            );
            array_push($arr_content, $newdata);
        }
        $x++;
    }




    if ($checker==NULL) {
        foreach ($arr_content as $line) {

            $projectID = $line['project'];
            $year = $line['year'];
            $title = $line['title'];
            $author = $line['author'];
            $abstract = $line['abstract'];
            $typeID = $line['typeoflit'];
            $categoryID = $line['category'];
            $source = $line['source'];
            $link = $line['link'];
            $userID = $line['inputtedby'];



            uploadliterature($projectID, $year, $title, $author, $abstract, $typeID, $categoryID, $source, $link, $userID);

        }
        return 1;
    } else {
        
        return $checker;
        
    }
}

function submit_form_literatureupload($projectID, $year, $title, $author, $abstract, $type, $category, $source, $keywords, $link, $userID) {




    $categoryID = comparecategory($category);

    $typeID = comparetypeoflit($type);

    $controller_result = uploadliterature($projectID, $year, $title, $author, $abstract, $typeID, $categoryID, $source, $keywords, $link, $userID);

    return 1;
}

function comparekeyword($keyword) {

    $result = getkeywordidfromtext($keyword);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $keyID = $arr_result['keywordID'];
        }
        return $keyID;
    } else {
        return $keyword;
    }
}

function comparecategory($category) {

    $result = getcategoryoflitfromtext($category);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $categoryID = $arr_result['categoryID'];
        }
        return $categoryID;
    } else {
        return 0;
    }
}

function comparetypeoflit($type) {

    $result = gettypeoflitfromtext($type);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $typeID = $arr_result['typeOfLitID'];
        }
        return $typeID;
    } else {
        return 0;
    }
}

function submitkeyword($keyword) {
    setkeyword($keyword);
}
