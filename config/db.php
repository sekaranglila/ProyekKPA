<?php
    $servername = "localhost";
    $username = "fpaxvcom_admin";
    $password = "yiJ36qq32H";
    $dbname = "fpaxvcom_fpaxv";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed" . $conn->connect_error);
    }
?>