<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $host = "localhost";
        $db = "base_trabalho";
        $user = "root";
        $pass = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

            //  definir tratamento de erro
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $nome       = $_POST['nome'];
            $telefone   = $_POST['telefone'];
            $email      = $_POST['email'];
            $senha      = $_POST['senha'];

            $sql = "INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

            $stmt->execute();

            echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<title>Retorno</title>
</head>
<body>
<h2>Cadastro Realizado com Sucesso</h2>
<button onclick="history.go(-1);">Retornar</button>
</body>
</html>';

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }

    }else{
        echo "Você não tem permissão para acessar o site";
    }
?>