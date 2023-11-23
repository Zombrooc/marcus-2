<!-- cadastro.php -->

<?php
include '../lib/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $publisherName = $_POST['publisherName'];


  $stmt = $conn->prepare("INSERT INTO publisher (publisherName) VALUES (?)");
  $stmt->execute([$publisherName]);
  header('Location: listar.php ');


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
      <h2>FAÇA AQUI O CADASTRO DA EDITORA!</h2>

      <form action="" method="POST">
        <div class="inputGroup">
          <div>
            <label> Nome da editora</label>
            <input name="publisherName" required />
          </div>

        </div>

        <button type="submit">Criar nova editora</button>
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