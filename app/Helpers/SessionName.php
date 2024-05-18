// File: app/Helpers/Session_helper.php
<?php

if (!function_exists('get_session_name')) {
    function get_session_name()
    {
        $session = session();
        return $session->get('name');
    }
}

if (!function_exists('get_user_level')) {
    function get_user_level()
    {
        $session = session();
        return $session->get('id_user_level');
    }
}
