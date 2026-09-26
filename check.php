<?php

session_start();

include 'database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? AND password = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    $_SESSION['username'] = $user['username'];

    header("Location: homepage.php");
    exit();

} else {

    echo "<script>
            alert('Invalid username or password!');
            window.location='login.php';
          </script>";
}

$stmt->close();
$conn->close();

?>