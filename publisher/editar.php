<!-- editar.php -->

<?php
include '../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  $stmt = $conn->prepare("SELECT * FROM publisher WHERE id = ?");
  $stmt->execute([$id]);
  $publisher = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
  <title>LIVRARIA CULTURAL</title>
  <meta charset="utf-8" />
  <link href="../css/estilo2.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="corpo">
    <div id="capa">
      <h1>
        LIVRARIA CULTURAL <br />Sua plataforma de cadastros e consultas de
        obras.
      </h1>
    </div>

    <div id="conteudo">
      <h2>ATUALIZAR EDITORA</h2>

      <form method="POST" action="atualizar.php">

        <input type="hidden" name="id" value="<?= $publisher['id'] ?>">

        <div class="inputGroup">
          <div>
            <label> Nome da editora</label>
            <input name="publisherName" value="<?= $publisher['publisherName'] ?>" />
          </div>

        </div>

        <button type="submit" name="update">Salvar</button>
      </form>
      <br /><br />
      <a href="./index.html">Voltar</a>
    </div>

    <div id="rodape">
      <p>
        LIVRARIA CULTURAL <br />
        TRÊS CORAÇÕES - MG
      </p>
    </div>
  </div>
</body>

</html>