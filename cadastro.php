<!-- cadastro.php -->

<?php
include 'lib/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bookName = $_POST["bookName"];
  $author = $_POST["author"];
  $yearRelease = $_POST["yearRelease"];
  $category = $_POST["category"];
  $bookDescription = $_POST["bookDescription"];
  $publisherId = $_POST['publisher_id'];


  $stmt = $conn->prepare("INSERT INTO books (bookName, author, yearRelease, category, bookDescription, publisherId) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->execute([$bookName, $author, $yearRelease, $category, $bookDescription, $publisherId]);
  header('Location: listar.php ');


}

$publishers = $conn->query("SELECT * FROM publisher")->fetchAll(PDO::FETCH_ASSOC);

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
      <h2>FAÇA AQUI O CADASTRO DA OBRA!</h2>

      <form action="" method="POST">
        <div class="inputGroup">
          <div>
            <label> Nome do livro</label>
            <input name="bookName" required />
          </div>
          <div>
            <label>Ano de Lançamento</label>
            <input name="yearRelease" required />
          </div>
        </div>
        <div class="inputGroup">
          <div>
            <label> Autor </label>
            <input name="author" required />
          </div>
          <div>
            <label> Categoria </label>
            <select name="category" required>
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
            <label style="width: 100%"> Descrição do livro </label>
            <textarea name="bookDescription" required></textarea>
          </div>
          <div>
            <label> Editora </label>
            <select name="publisher_id">
              <?php foreach ($publishers as $publisher): ?>
                <option value="<?= $publisher['id'] ?>">
                  <?= $publisher['publisherName'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <button type="submit">Criar novo livro</button>
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