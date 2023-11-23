<!-- listar.php -->

<?php
include '../lib/db.php';

try {
  $sql = "SELECT id, publisherName FROM publisher";

  $stmt = $conn->query($sql);

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erro: " . $e->getMessage();
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
      <h2>Lista de editoras</h2>
      <?php if ($stmt->rowCount() > 0): ?>
        <table border="2" bordercolor="black" width="40%" align="center">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
          </tr>

          <?php foreach ($rows as $row): ?>
            <tr>
              <td>
                <?php echo $row['id']; ?>
              </td>
              <td>
                <?php echo $row['publisherName']; ?>
              </td>
              <td>
                <a href="./editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="./deletar.php?id=<?= $row['id'] ?>">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>Nenhum registro encontrado.</p>
      <?php endif; ?>

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