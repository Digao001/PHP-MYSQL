<?php 
session_start();

if(!isset($_SESSION['usuario'])){
exit();
}

$usuarioLogado = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem vindo</h1>
    <h2><?php echo"$usuarioLogado"?></h2>
</body>
</html>