<html>
<body>
<?php

function connect_to_db() {
	$host="127.0.0.1";
	$port=3306;
	$socket="";
	$user="Darshan Don";
	$password="Darshandon@7";
	$dbname="shopmobi";

	$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());

	return $conn;
}

?>
</body>
</html>