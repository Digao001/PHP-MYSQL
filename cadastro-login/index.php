<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="index.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">
            <label for="senha">Senha:</label>
            <input type="text" id="senha" name="senhaLogin">
            <button type="submit">Entrar</button>
            <p>Não possui uma conta? <a href="cadastro.php">Cadastrar</a></p>
        </form>
    </div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conexao = new mysqli("localhost", "root", "", "cadastro_login");

    if ($conexao->connect_error) echo "Erro na conexão" . $conexao->connect_error;

    else {
        $usuario = $conexao->real_escape_string($_POST['usuario']);
        $senhaLogin = $conexao->real_escape_string($_POST['senhaLogin']);

        $prepare = $conexao->prepare("SELECT senha FROM usuarios WHERE usuario = ?");
        $prepare->bind_param("s", $usuario);
        $prepare->execute();
        $resultado = $prepare->get_result();

        if($resultado->num_rows > 0){
            $res = $resultado->fetch_assoc();
            $senhaHash = $res['senha'];

            if(password_verify($senhaLogin, $senhaHash)){
                
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: painel.php');
            } else {
                echo"Senha incorreta";
            }
            $conexao->close();
            $prepare->close();
        }
    }
}
?>