<?php
    //Start Session
    session_start();
    ob_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL','http://localhost/wushu-society/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','wushu-society');

    $conn = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME); //Database Connection

?>