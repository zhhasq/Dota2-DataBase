<?php
$host = 'chester.cs.unm.edu';
$user = 'zhongs';
$password = 'MUq9V1Ad';
$database = 'zhongs';

$db = new mysqli($host, $user, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
