<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
    <title>Conversor de moeda</title>
</head>

<body>
    <div class="container">
        <form method="GET">
            <select name="select" id="select">
                <option value="dolar">Dólar</option>
                <option value="euro">Euro</option>
                <option value="libra">Libra</option>
                <option value="iene">Iene</option>
                <option value="peso">Peso</option>
            </select>
            <input type="number" placeholder="Valor em real" name="valorReal" class="real" id="valor">
            <button type="submit" class="btn">Pronto</button>
        </form>
        <div class="result">

            <?php

            $select = $_GET["select"];
            $real = $_GET["valorReal"];
            $cotacao = ["dolar", "euro", "libra", "iene", "peso"];
            $cotacaoDolar = 5.56;
            $cotacaoEuro = 6.51;
            $cotacaoLibra = 7.52;
            $cotacaoIene = 0.038;
            $cotacaoPeso = 0.0044;

            if ($select === "dolar") {
                echo number_format($real, 2, ",", ".") . "<strong>R$ Reais </strong>" . "<br>" . "Equivalem a " . number_format($real / $cotacaoDolar, 2, ",", ".") . "<strong> R$ Dólares </strong>";

            } else if ($select === "euro") {
                echo number_format($real, 2, ",", ".") . "<strong> Reais </strong>" . "<br>" . "Equivalem a " . number_format($real / $cotacaoEuro, 2, ",", ".") . "<strong> R$ Euros </strong>";

            } else if ($select === "libra") {
                echo number_format($real, 2, ",", ".") . "<strong> Reais </strong>" . "<br>" . "Equivalem a " . number_format($real / $cotacaoLibra, 2, ",", ".") . "<strong> R$ Libras </strong>";

            } else if ($select === "iene") {
                echo number_format($real, 2, ",", ".") . "<strong> Reais </strong>" . "<br>" . "Equivalem a " . number_format($real / $cotacaoIene, 2, ",", ".") . "<strong> R$ Ienes </strong>";

            } else if ($select === "peso") {
                echo number_format($real, 2, ",", ".") . "<strong> Reais </strong>" . "<br>" . "Equivalem a " . number_format($real / $cotacaoPeso, 2, ",", ".") . "<strong> R$ Peso argentino </strong>";
            }
            ?>
        </div>
    </div>


</body>

</html>