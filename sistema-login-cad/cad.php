<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cad</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php 

$conexao = new mysqli("localhost", "root", "", "sistemalogin");

if($conexao -> connect_error) die("Erro na conexão");

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$user = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$sql = "SELECT * FROM usuario WHERE email = '$email' AND usuario = '$user'";

$injetar = mysqli_query($conexao, $sql);

if(mysqli_num_rows($injetar) > 0) die("<h1>Usuário já cadastrado <a href='index.html'>Voltar</a></h1>");

$sql = "INSERT INTO usuario (nome, email, usuario, senha) VALUES('$nome', '$email', '$user', '$senha')";

if(mysqli_query($conexao, $sql)) echo"<h1>Cadastrado com sucesso</h1>";
else echo"<h1>erro ao cadastrar</h1>". mysqli_error($conexao);



?>