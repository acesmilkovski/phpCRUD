<?php 
    require_once "./connection.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Employee WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: index.php");
?>