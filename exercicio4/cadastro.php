<?php
include 'model/usuarioModel.class.php';

use ciet\exercicio4\model\UsuarioModel\UsuarioModel;

$acao = $_POST['acao'];
$mensageria = null;

if (isset($acao) && $acao == "Enviar dados") {
    $dados = array ("nome" => trim($_POST['nome']),
                    "email" => trim($_POST['email']),
                    "telefone" => trim($_POST['telefone']),
                    "login" => trim($_POST['login']),
                    "senha" => base64_encode(md5(trim($_POST['senha']))));
;
    $usuario = new UsuarioModel();
    $mensageria = $usuario->salvarDados($dados);
}
?>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
<h4><?php echo $mensageria; ?></h4>
<form name="form1" action="#" method="post">
    <label>Digite o nome:</label>
    <input type="text" name="nome"><br>

    <label>Digite o email:</label>
    <input type="email" name="email"><br>

    <label>Digite o telefone:</label>
    <input type="number" name="telefone"><br>

    <label>Digite o login:</label>
    <input type="text" name="login"><br>

    <label>Digite a senha:</label>
    <input type="password" name="senha"><br>

    <input type="submit" name="acao" id="acao" value="Enviar dados">
</form>
</body>
</html>
