<!-- atualizar.php -->

<?php
include 'lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['bookId'];
    $bookName = $_POST["bookName"];
    $author = $_POST["author"];
    $yearRelease = $_POST["yearRelease"];
    $category = $_POST["category"];
    $bookDescription = $_POST["bookDescription"];

    $stmt = $conn->prepare("UPDATE books SET bookName=?, author=?, yearRelease=?, category=?, bookDescription=? WHERE id=?");
    $stmt->execute([$bookName, $author, $yearRelease, $category, $bookDescription, $id]);
}

header('Location: listar.php');
exit();
?>