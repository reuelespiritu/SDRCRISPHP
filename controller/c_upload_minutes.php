<?php

require_once ('model/m_minutes_meeting.php');

function submit_minutes($projectID, $data, $userid) {
    if ($data['type'] == "application/vnd.ms-excel") {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }

        $x = 1;
        $checker = array();
        foreach ($lines as $arr_result) {
            $title = $arr_result[0];
            if ($title == NULL || is_string($title)) {
                $checker['title'] = $x;
            }
            $minutes = $arr_result[1];
            if ($minutes == NULL || is_string($minutes)) {
                $checker['minutes'] = $x;
            }
            $year = $arr_result[2];
            if ($year == NULL || $year < 0) {
                $checker['year'] = $x;
            }
            $meetingDate = $arr_result[3];
            if ($meetingDate == NULL || is_string($meetingDate)) {
                $checker['meetingDate'] = $x;
            }

            $x++;

            if ($x != 2) {

                $controller_result = upload_minutes($projectID, $title, $minutes, $meetingDate, $userid);
            }
        }
        echo "<script type='text/javascript'>alert('Minutes of the Meeting successfully uploaded!');</script>";

        header('Location: visualization_minutes_meeting.php');
    } else {
        echo "<script type='text/javascript'>alert('Please upload a csv file!');</script>";
    }
}

function submit_minutes_form($projectID, $title, $minutes, $meetingDate, $userid){
    $controller_result = upload_minutes($projectID, $title, $minutes, $meetingDate, $userid);
    echo "<script type='text/javascript'>alert('Minutes of the Meeting successfully uploaded!');</script>";
    
    header('Location: visualization_minutes_meeting.php');
}
?>

