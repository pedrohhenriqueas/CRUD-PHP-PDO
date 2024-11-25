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
                echo "Usuário excluído com sucesso";
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