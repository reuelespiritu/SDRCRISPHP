<?php

require_once 'model/m_project_user.php';
require_once 'model/m_user.php';

function generate_all_projectusers() {

    $result = array();
    $result = getalluserswithoutusertype();
    return $result;
}

function submit_project_user($user,$project){
    foreach($user as $members){
        $member = $members[0];
         $controller_result= assignprojectuser($member, $project);
    }
     echo "<script type='text/javascript'>alert('Assignment to project successful!');</script>";
}

