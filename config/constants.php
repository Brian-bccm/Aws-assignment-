<?php
    //Start Session
    session_start();
    ob_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL','http://localhost/wushu-society/');
    define('LOCALHOST','lab-db.cqrei3axetnf.us-east-1.rds.amazonaws.com');
    define('DB_USERNAME','lab-db');
    define('DB_PASSWORD','admin1234');
    define('DB_NAME','wushu-society');

    $conn = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME); //Database Connection

?>
