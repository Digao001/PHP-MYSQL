<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log</title>
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

session_set_cookie_params(["httponly" => true]);
session_start();

$conexao = new mysqli("localhost", "root", "", "sistemalogin");

if($conexao -> connect_error) die("Erro na conexão");

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";

$inserir = mysqli_query($conexao, $sql);

if(mysqli_num_rows($inserir) === 1){
    $dados = mysqli_fetch_assoc($inserir);

    if($dados['senha'] === $senha AND $dados['usuario'] === $usuario){
        $_SESSION['usuario'] = $dados['usuario'];
        header("location: dashboard.php");
        exit;
    }
} else {
    echo "<h1>Login ou senha incorretos</h1>";
}

?>