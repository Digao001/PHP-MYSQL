<?php 

$conexao = new mysqli("localhost", "root", "", "sessao");

class Users{
    public $nome;
    public $idade;
    public $endereco;

    public function __construct($nome, $idade, $endereco){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->endereco = $endereco;
    }

    public function salvar($conexao){
        $sql = $conexao->prepare("INSERT INTO user (nome, idade, endereco) VALUES(?,?,?)");
        $sql->bind_param("sis", $this->nome, $this->idade, $this->endereco);
        $sql->execute();
    }

    public function puxar($conexao){
        $sql = $conexao->prepare("SELECT * FROM user WHERE nome = ? ");
        $sql->bind_param("s", $this->nome);
        $sql->execute();

        $result = $sql->get_result();
        if($result->num_rows > 0){
           $dados = $result->fetch_assoc();
           echo "Nome buscado no banco" . $dados['nome'];
        } else {
            echo"";
        }
    }
}

$nome = $_GET['nome'];
$idade = $_GET['idade'];
$endereco = $_GET['endereco'];

$usuario = new Users($nome, $idade, $endereco);

$usuario->puxar($conexao);

$conexao->close();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO E MYSQL</title>
</head>

<body>
    <form method="get">
        <input type="text" name="nome" placeholder="nome">
        <input type="number" name="idade" placeholder="idade">
        <input type="text" name="endereco" placeholder="endereço">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

