<html>
<body>
<?php
    include("connect.php");
    $conn = connect_to_db();
    $email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $pass = $_POST["password"];
    }

    $sql = "SELECT * FROM user WHERE email = '" . $email . "' and password = '" . $pass ."';";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $info = $result->fetch_assoc();
        $_SESSION["user-id"] = $user = $info["user_id"];
        $_SESSION["username"] = $info["name"];
        

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "SELECT s.phone_name AS phone_name, c.quantity AS quantity, s.prize AS prize FROM smartphone s, cart c WHERE s.phone_id = c.phone_id AND c.user_id = '$user';";
    $result = $conn->query($sql);
    $_SESSION["no-in-cart"] = $result->num_rows;


    $conn->close();

    header( 'Location: home.php' );
?>
</body>
</html>