<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Área do Usuário</title>
  <link rel="stylesheet" href="dashboard.css">

</head>
<body>

<div class="container">
  <h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>
  <p>Você está logado como <strong><?php echo $_SESSION['usuario']; ?></strong>.</p>
  <p>Esta é sua área de usuário.</p>

  <?php 
  session_destroy();
  echo "<a class='logout' href='index.html'>Sair</a>?";
  
  ?>;

</div>

</body>
</html>
