<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com php</title>
    <style>
        .container{
            display: grid;
            place-items: center;
            margin-top: 20%;
        }
         h2{
            border: 1px solid;
            padding: 5px;
            border-radius: 7px;
         }
    </style>
</head>

<body>
<?php 

$nome = trim($_POST['nome'] ?? "indefinido");
$mensagem= trim($_POST['mensagem'] ?? "indefinido");
$endereco = trim($_POST['endereco'] ?? "indefinido");
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$somenteLetras = preg_match('/^[A-Za-z]+$/', $nome);
if(!$email){
    echo"Email inválido";
    return;
}

if(empty($nome) || empty($mensagem) || empty($endereco) || empty($email)){
    echo"Dados em branco";
    return;
}

else if(mb_strlen($nome) <= 2 || !$somenteLetras){
    echo"Nome muito curto ou inválido";
    return;
}

else if(mb_strlen($endereco) <= 5){
    echo"Endereço muito curto";
    return;
}
?>

<div class="container">
    <h2><?php echo"Nome:".htmlspecialchars($nome)?></h2>
    <h2><?php echo"endereço:".htmlspecialchars($endereco)?></h2>
    <h2><?php echo"Email:".htmlspecialchars($email)?></h2>
    <h2><?php echo"mensagem:".htmlspecialchars($mensagem)?></h2>
</div>
</body>

</html>