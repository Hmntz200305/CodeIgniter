// File: app/Helpers/Session_helper.php
<?php

if (!function_exists('get_session_name')) {
    function get_session_name()
    {
        $session = session();
        return $session->get('name');
    }
}
