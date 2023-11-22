<!-- db.php -->

<?php
$servername = "localhost";
$username = "root";
$dbname = "library";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro na conexão: " . $e->getMessage());
}
?>