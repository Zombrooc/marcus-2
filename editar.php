<!-- editar.php -->

<?php
include 'lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
  $stmt->execute([$id]);
  $book = $stmt->fetch(PDO::FETCH_ASSOC);
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
      <h2>ATUALIZAR LIVRO</h2>

      <form method="POST" action="atualizar.php">

        <input type="hidden" name="bookId" value="<?= $book['id'] ?>">

        <div class="inputGroup">
          <div>
            <label> Nome do livro</label>
            <input name="bookName" value="<?= $book['bookName'] ?>" />
          </div>
          <div>
            <label>Ano de Lançamento</label>
            <input name="yearRelease" value="<?= $book['yearRelease'] ?>" />
          </div>
        </div>
        <div class="inputGroup">
          <div>
            <label> Autor </label>
            <input name="author" value="<?= $book['author'] ?>" />
          </div>
          <div>
            <label> Categoria </label>
            <select name="category">
              <option value="Ficção">Ficção</option>
              <option value="Religioso">Religioso</option>
              <option value="Infantil">Infantil</option>
              <option value="Ação">Ação</option>
              <option value="Auto-ajuda">Auto-ajuda</option>
            </select>
          </div>
        </div>
        <div class="inputGroup">
          <div style="display: flex; flex-direction: column">
            <label style="width: 100%"> Descrição </label>
            <textarea name="bookDescription" value="<?= $book['bookDescription'] ?>"></textarea>
          </div>
        </div>
        <button type="submit" name="update">Salvar</button>
      </form>
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