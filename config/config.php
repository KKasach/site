<?php
session_start();
$title='Site name';
$description='Site description';
$keywords='';
$email='';
//var turn on
$db_location='localhost';
$db_user='root';
$db_pass='';
$db_name='site';
$db_con= mysqli_connect($db_location, $db_user, $db_pass, $db_name);
if(!$db_con){
	exit('Error');
}
//mysqli_query($db_con "SET NAMES 'utf8'");

?>
