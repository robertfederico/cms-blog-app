<?php

session_start();

session_destroy();

$_SESSION['username'] = null;
$_SESSION['f_name'] = null;
$_SESSION['l_name'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_id'] = null;
$_SESSION['user_email'] = null;

header("Location: ../../index.php");