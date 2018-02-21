<?php

require_once 'model/m_user.php';

function submit_userform($firstname, $middlename, $lastname, $email, $password1, $password2, $specializations, $masters, $doctorate) {

    if ($password1 == $password2) {
        $controller_result = setuser($firstname, $middlename, $lastname, $email, $password1, $specializations, $masters, $doctorate);
    } else {
        return 2;
    }
}
