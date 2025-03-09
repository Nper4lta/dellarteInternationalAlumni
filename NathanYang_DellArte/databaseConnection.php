<?php
require_once("hum_conn_no_login.php");

$alumniName = htmlspecialchars(strip_tags($_GET["input_alumni_name"]));
$connection = hum_conn_no_login();

$alumniQuery = oci_parse($connection, "
	select FIRST_NAME, 
		LAST_NAME, 
		CITY,
		STATE_PROVINCE 
	from users
	where FIRST_NAME = :input_alumniName OR LAST_NAME  = :input_alumniName
	");

oci_bind_by_name($alumniQuery, ":input_alumniName", $alumniName);
oci_execute($alumniQuery, OCI_DEFAULT);

if (!oci_fetch($alumniQuery)) {
	die("invalid");
}

$fname = oci_results($alumniQuery, 'FIRST_NAME');
$lname = oci_results($alumniQuery, 'LAST_NAME');
$city = oci_results($alumniQuery, 'CITY');
$state = oci_results($alumniQuery, 'STATE_PROVINCE');

?> 