<!-- confirmar_exclusao.php -->

<?php
include '../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  $stmtDeleteBooks = $conn->prepare("DELETE FROM books WHERE publisherId = ?");
  $stmtDeleteBooks->execute([$id]);

  $stmt = $conn->prepare("DELETE FROM publisher WHERE id = ?");
  $stmt->execute([$id]);

  // Redirecionar de volta para a página principal após a exclusão
  header('Location: listar.php');
  exit();
}
?>