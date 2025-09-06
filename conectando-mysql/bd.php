<?php 
$servidor = "localhost";
$loginBd = "root";
$senhaBd = // "Sua senha do banco"//
$banco = "login";

$conexao = mysqli_connect($servidor, $loginBd, $senhaBd, $banco);

if(!$conexao){
    die("Erro na conexão");
}

$loginUser = $_POST["login"] ?? "";
$senhaUser = $_POST["senha"] ?? "";
$emailUser = $_POST["email"] ?? "";

if(empty($loginUser) || empty($senhaUser) || empty($emailUser)){
    die("Preencha os campos");
}

$senhaProtegida = password_hash($senhaUser, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (login, senha, email) VALUES (?,?,?)";

$prepare = mysqli_prepare($conexao, $sql);

if($prepare){
    mysqli_stmt_bind_param($prepare, "sss", $loginUser, $senhaProtegida, $emailUser);

    if(mysqli_stmt_execute($prepare)){
        echo"Cadastrado com sucesso";
    } else 
    {
        echo "Erro ao cadastrar " . mysqli_error($conexao);
    }

    mysqli_stmt_close($prepare);
}

mysqli_close($conexao);
?>