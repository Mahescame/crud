<?php
include_once "conexao.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    $conexaoComBanco = abrirBanco();

    $sql = "insert into pessoas (nome, sobrenome, nascimento, endereco, telefone)
            values ('$nome', '$sobrenome', '$nascimento', ' $endereco', '$telefone')";

        //echo "<pre>";
        //print_r($sql);
        //echo "</pre>";

    if ($conexaoComBanco->query($sql) === TRUE) {
        echo "Contato salvo com sucesso no banco de dados :)";
    } else {
        echo "Erro ao salvar no banco de dados :(" . $conexaoComBanco->error;
    }

    fecharBanco($conexaoComBanco);

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Agenda de contatos</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cadastrar.php">Cadastrar</a></li>
                </ul>
            </nav>
    </header>
    <section>
        <h2 class='cortitulo2' >Cadastro de Contatos</h2>
        <form action="" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name= "nome" required>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name= "sobrenome" required>

            <label for="nascimento">Nascimento</label>
            <input type="date" name= "nascimento" required>

            <label for="endereco">Endereço</label>
            <input type="text" name= "endereco" required>

            <label for=telefone">Telefone</label>
            <input type="text" name= "telefone" required>

            <button type="submit">Salvar</button>
    </section>
</body>
</html>