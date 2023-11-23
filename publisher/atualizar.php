<!-- atualizar.php -->

<?php
include '../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $publisherName = $_POST["publisherName"];

    $stmt = $conn->prepare("UPDATE publisher SET publisherName=? WHERE id=?");
    $stmt->execute([$publisherName, $id]);
}

header('Location: listar.php');
exit();
?>