<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Lista</title>
</head>
<?php
session_start();
if (!isset($_SESSION['logado'])){
    header('Location: login.php');
} 

require("Conexao.php");
require("FundoImobiliario.php");
// Instanciar uma nova conexão
$con = new Conexao("localhost", "3306", "bd_roteiro1", "root", "vertrigo");

// Conectar à base de dados
$con->conectar();

// Executar a consulta dos fundos no banco de dados e criar um array para mostrar na tela os fundos
$query = "SELECT * FROM fundos";
$fundos = array();
$fundos = $con->list($query);

// Desconectar da base de dados
$con->desconectar();
?>

<body>
    <div class="container">
        <div class="row mt-4 mb-4">
            <a href="cadastrarForm.php" class="btn btn-info mr-5" role="button">Cadastrar</a>
            <a href="logout.php" class="btn btn-info" role="button">Logout</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ticker</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <!-- lógica para exibir os fundos recuperados no banco da tela -->
                <?php
                    foreach ($fundos as $f) {
                        echo "<tr>";
                            echo "<td>" .$f["nome"]. "</td>";
                            echo "<td>" .$f["ticker"]. "</td>";
                            echo "<td>" .$f["valor"]. "</td>";
                            echo "<td>" .$f["quantidade"]. "</td>";
                            echo "<td>" .$f["data"]. "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>