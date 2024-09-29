<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'bkitymxy_medaprove');
define('DB_PASSWORD', 'giJr](r8b?NZ');
define('DB_NAME', 'bkitymxy_medaprove');
// define('DB_USER_TBL', 'users');

$raw_link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$link = mysqli_connect("localhost","bkitymxy_medaprove","giJr](r8b?NZ","bkitymxy_medaprove");

if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

?>