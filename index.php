<?php
error_reporting(0);
session_start();

require_once 'config.php';
require_once 'page.php';
if(isset($_SESSION['LOGIN_ID'])){
	$id_login = $_SESSION['LOGIN_ID'];
	require_once 'template.php';
}else{
	require_once 'form_login.php';
}



?>