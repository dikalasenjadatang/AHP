<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'db_ahp';

$web_host='http://eso.ip-dynamic.com/g/SPK_AHP/';

$link=mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name,$link);

?>