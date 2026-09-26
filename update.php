<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$sql = "UPDATE students
        SET firstname = ?, lastname = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssi",
    $firstname,
    $lastname,
    $id
);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: homepage.php");
exit();

?>