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

            $id = $_POST['id'];

            $sql = "DELETE FROM usuarios WHERE id = :id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if($stmt->execute()){
            echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<title>Retorno</title>
</head>
<body>
<h2>Usuário excluído com sucesso</h2>
<button onclick="history.go(-3);">Retornar</button>
</body>
</html>';
            }else{
                echo "Erro ao excluir cadastro";
            }

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }else{
        echo "Você não tem permissão para acessar o site";
    }
?>