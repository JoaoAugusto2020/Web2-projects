<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Cadastrar</title>
</head>
<?php
session_start();
if (!isset($_SESSION['logado'])){
    header('Location: login.php');
} 
require("Conexao.php");
require("FundoImobiliario.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    // Coleta os dados do formulário
    $nome = $_POST["nome"];
    $ticker = $_POST["ticker"];
    $valor = $_POST["valor"];
    $quantidade = $_POST["quantidade"];
    if(!isset($_POST["data"])) $data = $_POST["data"];
    else $data = date("Y-m-d");
    $f = new FundoImobiliario($nome, $ticker, $valor, $quantidade, $data);

    // Valida os dados do formulário
    $erro=0;
    if(strlen($ticker>10)){
        $erro++;
        echo "<script>alert('O ticker não pode ter mais de 10 caracteres'); javascript:history.go(-1);</script>";
    }else if($quantidade<0){
        $erro++;
        echo "<script>alert('A quantidade não pode ser negativa'); javascript:history.go(-1);</script>";
    }

    // Instanciar uma nova conexão
    $con = new Conexao("localhost", "3306", "bd_roteiro1", "root", "vertrigo");

    // Conectar à base de dados
    $con->conectar();

    // Executar a inserção de um fundo no banco de dados.
    $insert = "INSERT INTO `fundos` (`id`, `nome`, `ticker`, `valor`, `quantidade`, `data`) VALUES (NULL, '$nome', '$ticker', $valor, $quantidade, '$data')";
    if($con->create($insert)){
        echo "<script>alert('Sucesso!')</script>";
        echo "
        <div class='alert alert-success d-flex align-items-center' role='alert'>
            Fundo cadastrado com sucesso!
        </div>";
    }
}
?>

<body>
    <div class="container justify-center">
        <form role="form" class="mt-5" method="post" action="cadastrarForm.php">
            <!-- aqui será criado o formulário para enviar os dados do funco a ser inserido no banco -->
            <div class="form-group row">
                <label for="inputNome" class="col-sm-1 col-form-label">Nome</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTicker" class="col-sm-1 col-form-label">Ticker</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputTicker" name="ticker" placeholder="Ticker" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputValor" class="col-sm-1 col-form-label">Valor</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="inputValor" name="valor" placeholder="Valor">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputQuantidade" class="col-sm-1 col-form-label">Quantidade</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="inputQuantidade" name="quantidade" placeholder="Quantidade" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputData" class="col-sm-1 col-form-label">Data</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="inputData" name="data" placeholder="Data">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Cadastrar" name="submit" class="btn btn-info" />
                </div>
            </div>
        </form>
    </div>
</body>