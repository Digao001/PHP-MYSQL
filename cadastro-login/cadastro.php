<?php 
$mensagem = "";
if($_SERVER['REQUEST_METHOD'] === "POST"){

$conexao = new mysqli('localhost', 'root', "", "cadastro_login");

if($conexao->connect_error){
    echo"Erro na conexão";
} else {

$nome= $conexao->real_escape_string($_POST['nome']);
$email= $conexao->real_escape_string($_POST['email']);
$usuario= $conexao->real_escape_string($_POST['usuario']);
$senha= $conexao->real_escape_string($_POST['senha']);
$senhaProtegida = password_hash($senha, PASSWORD_DEFAULT);

if(empty($nome) || empty($email) || empty($usuario) || empty($senhaProtegida)){
    $mensagem = "<h1 style='color: green;'>Campos vazios<h1>";
}
$prepare = $conexao->prepare("INSERT INTO usuarios (nome, email, usuario, senha) VALUES(?,?,?,?)");
$prepare->bind_param("ssss", $nome, $email, $usuario, $senhaProtegida);
if($prepare->execute()){
    $mensagem = "<h1 style='color: green;'>Cadastrado com sucesso <h1>";
    $conexao->close();
    header('Location: index.php');
}

}
$conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="cadastro.php" method="POST">
            <h1>Cadastre Agora !</h1>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">
            <label for="email">Email:</label>
            <input type="email"
                id="email" name="email">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">
            <label for="senha">Senha:</label>
            <input type="text" id="senha" name="senha">
            <button type="submit">Entrar</button>
            <p>Já possui uma conta? <a href="index.php">Entrar</a></p>
            <div class="mensagem">
                <?php echo $mensagem;?>
            </div>
        </form>
    </div>
    <script>
        let msg = document.querySelector(".mensagem");
        window.onload = ()=> setTimeout(()=>{
            msg.style.display = "none";
        }, 3000)
    
    </script>
</body>

</html>
