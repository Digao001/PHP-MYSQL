<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessao</title>
</head>
<body>
    <?php 
    session_set_cookie_params(['httponly'=>true]);
    session_start();

    $_SESSION['usuario'] = [
        "nome"=> $_POST['nome'],
        "senha"=> $_POST['senha']
    ];

    if(isset($_SESSION['usuario']) && $_SESSION['usuario']["nome"] === "Rodrigo" && (int)$_SESSION['usuario']["senha"] === 123456){
        echo"Logado com sucesso";
    } else {
        echo "<br> Dados incorretos";
        echo"<a href='index.php'>Voltar</a>";
    }
    ?>
</body>
</html>