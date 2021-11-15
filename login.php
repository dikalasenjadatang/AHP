<?php
error_reporting(0);
session_start();
require_once 'config.php';

if(isset($_POST['login'])){
	if(empty($_POST['username']) || empty($_POST['password']))	{
		exit("<script>window.alert('Masukkan username dan password anda');window.history.back();</script>");
	}
	$username=$_POST['username'];
	$password=$_POST['password'];
	$q=mysql_query("SELECT * FROM admin WHERE username='".$username."' and password='".$password."'");
	if(mysql_num_rows($q)==0){
		exit("<script>window.alert('Username dan password salah');window.history.back();</script>");
	}
	$h=mysql_fetch_array($q);
	$id_admin=$h['id_admin'];
	
	$_SESSION['LOGIN_ID']=$id_admin;
	exit("<script>window.location='".$web_host."';</script>");
}

?>