<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>
<?php
    session_start();
    if (isset($_SESSION['logado'])){
        header('Location: listar.php');
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Coleta os dados do formulário
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            if($usuario=="aluno" && $senha=="iftm"){
                $_SESSION["logado"] = true;
                header('Location: listar.php');
            } else {
                echo "<script>alert('Usuário e/ou senha inválidos!')</script>";
            }
        }
    }
?>
<body>
    <div class="container">
        <form role="form" class="mt-5" method="post" action="login.php">
            <div class="form-group row">
                <label for="inputUsuario" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSenha" class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Login" name="submit" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</body>