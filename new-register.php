<html>
<body>
<?php
    include("connect.php");
    $conn = connect_to_db();
    $name = $email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
    }

    $sql = "CALL register('$name', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header( 'Location: home.php' );
?>
</body>
</html>
