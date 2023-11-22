<!-- pesquisar.php -->

<?php
include 'lib/db.php';

$rows = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
  $search = '%' . $_GET['search'] . '%';
  $stmt = $conn->prepare("SELECT * FROM books WHERE bookName LIKE ? OR id = ?");
  $stmt->execute([$search, $_GET['search']]);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
      <h2>Pesquisa de Usuários</h2>

      <form id="searchForm">
        <label for="search">Pesquisar por ID ou Nome:</label>
        <input type="text" name="search" required>
        <button type="button" onclick="performSearch()">Pesquisar</button>

      </form>

      <table border="2" bordercolor="black" width="40%" align="center">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Autor</th>
          <th>Ano de Lançamento</th>
          <th>Categoria</th>
          <th>Descrição</th>
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
              <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
              <a href="deletar.php?id=<?= $row['id'] ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <a href="index.html">Voltar</a>
      <br /><br />
    </div>

    <div id="rodape">
      <p>
        LIVRARIA CULTURAL <br />
        TRÊS CORAÇÕES - MG
      </p>
    </div>
  </div>

  <script>
    function performSearch() {
      var searchInput = document.getElementById('searchInput').value;
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('searchResults').innerHTML = xhr.responseText;
        }
      };

      xhr.open('GET', 'render_results.php?search=' + encodeURIComponent(searchInput), true);
      xhr.send();
    }
  </script>
</body>

</html>