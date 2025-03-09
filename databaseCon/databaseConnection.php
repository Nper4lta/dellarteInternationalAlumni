<?php
require_once("hum_conn_no_login.php");

$alumniName = htmlspecialchars(strip_tags($_POST["fname"]));
$connection = hum_conn_no_login();

$alumniQuery = oci_parse($connection, "
	select FIRST_NAME
	from users
	where FIRST_NAME = :fname
	");

oci_bind_by_name($alumniQuery, ":fname", $alumniName);
oci_execute($alumniQuery, OCI_DEFAULT);
if (!oci_fetch($alumniQuery)) {
	die("invalid!");
}

$firstName = oci_result($alumniQuery, 'first_name');

/*
$lname = oci_results($alumniQuery, 'LAST_NAME');
$city = oci_results($alumniQuery, 'CITY');
$state = oci_results($alumniQuery, 'STATE_PROVINCE'); */
?> 

<html>
	<body> 
<?php
	echo $firstName;
?>
	</body>	


</html>

