<!-- listar.php -->

<?php
include 'lib/db.php';

try {
  // $sql = "SELECT id, bookName, yearRelease, author, category, bookDescription FROM books";
  // $stmt = $conn->query($sql);

  $sql = "SELECT books.*, publisher.publisherName as publisherName FROM books LEFT JOIN publisher ON books.publisherId = publisher.id";
  $stmt = $conn->query($sql);

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $publisher = $conn->query("SELECT * FROM publisher")->fetchAll(PDO::FETCH_ASSOC);
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
  <link href="css/estilo2.css" rel="stylesheet" type="text/css" />
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
      <h2>Lista de Usuários</h2>
      <?php if ($stmt->rowCount() > 0): ?>
        <table border="2" bordercolor="black" width="40%" align="center">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Autor</th>
            <th>Ano de Lançamento</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Editora</th>
            <th>Ações</th>
          </tr>

          <?php foreach ($rows as $row): ?>
            <tr>
              <td>
                <?php echo $row['id']; ?>
              </td>
              <td>
                <?php echo $row['bookName']; ?>
              </td>
              <td>
                <?php echo $row['author']; ?>
              </td>
              <td>
                <?php echo $row['yearRelease']; ?>
              </td>
              <td>
                <?php echo $row['category']; ?>
              </td>
              <td>
                <?php echo $row['bookDescription']; ?>
              </td>
              <td>
                <?php echo $row['publisherName']; ?>
              </td>
              <td>
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="deletar.php?id=<?= $row['id'] ?>">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>Nenhum registro encontrado.</p>
      <?php endif; ?>

      <br /><br />
      <a href="index.html">Voltar</a>

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