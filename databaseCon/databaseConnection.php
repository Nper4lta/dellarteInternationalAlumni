<!DOCTYPE html>
<?php

require_once("hum_conn_no_login.php");

$alumniName = htmlspecialchars(strip_tags($_POST["fname"]));
$connection = hum_conn_no_login();

$alumniQuery = oci_parse ($connection, "
	select first_name
	from users
	where first_name = :input_alumniName
	");

oci_bind_by_name($alumniQuery, ":input_alumniName", $alumniName);
oci_execute($alumniQuery, OCI_DEFAULT);
oci_fetch($alumniQuery);
/*
if (!oci_fetch($alumniQuery)) {
	die("invalid!");
}
 */
?>

<?php

$fname = oci_results($alumniQuery, 'first_name');

/*
$lname = oci_results($alumniQuery, 'LAST_NAME');
$city = oci_results($alumniQuery, 'CITY');
$state = oci_results($alumniQuery, 'STATE_PROVINCE');
*/
?> 

<html>
	<body> 
	Testing <?php echo $fname; ?> 
	</body>	


</html>

