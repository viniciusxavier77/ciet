<?php
include 'useForm.class.php';

use ciet\exercicio6\model\UseForm\UseForm;

$arrayCidades = array(0 => 'Brasília',
    1 => 'Formosa');

$arrayEstados = array(0 => "DF",
                      1 => "GO");

$useForm = new UseForm();
?>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
<form name="form1" method="post">
    <label>Selecione a cidade:</label>
    <?php echo $useForm->criarSelectField("cidades", $arrayCidades); ?> <br>

    <label>Selecione o estado:</label>
    <?php echo $useForm->criarSelectField("estados", $arrayEstados); ?> </br>
</form>
</body>
</html>
