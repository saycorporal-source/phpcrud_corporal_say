<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: homepage.php");
exit();

?>