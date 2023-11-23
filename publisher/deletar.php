<!-- deletar.php -->

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  echo "<script>
            if (confirm('Tem certeza que deseja excluir essa editora? Todos os livros dessa editora também serão apagados!')) {
                window.location.href = 'confirmar_exclusao.php?id={$id}';
            } else {
                window.location.href = 'listar.php';
            }
          </script>";

}

?>