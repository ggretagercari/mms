<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Delete movie
    $sql = "DELETE FROM movies WHERE id = :movie_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':movie_id', $movie_id);
    $stmt->execute();

    header("Location: dashboard.php");
    exit;
}
?>
