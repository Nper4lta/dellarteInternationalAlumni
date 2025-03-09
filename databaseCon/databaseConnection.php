<?php
require_once("hum_conn_no_login.php");

$connection = hum_conn_no_login();

$alumniName = htmlspecialchars(strip_tags($_POST["placeHolder"]));

$alumniQuery = oci_parse ($connection, "
	select FIRST_NAME, 
		LAST_NAME, 
		CITY,
		STATE_PROVINCE 
	from users
	");

oci_bind_by_name($alumniQuery);
oci_execute($alumniQuery, OCI_DEFAULT);

if (!oci_fetch($alumniQuery)) {
	die("invalid");
}


$fname = oci_results($alumniQuery, 'FIRST_NAME');
$lname = oci_results($alumniQuery, 'LAST_NAME');
$city = oci_results($alumniQuery, 'CITY');
$state = oci_results($alumniQuery, 'STATE_PROVINCE');


?> 

