<?php
include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM teknisi WHERE id = ?");
        $stmt->execute([$id]);
        
        header("Location: teknisi.php?success=deleted");
        exit();
    } catch(PDOException $e) {
        header("Location: teknisi.php?error=delete_failed");
        exit();
    }
} else {
    header("Location: teknisi.php");
    exit();
}
?>