<?php
include('../config/dbcon.php');
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    ob_end_flush();
    exit(0);
}

?>