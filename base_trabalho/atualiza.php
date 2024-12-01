<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
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

            $id       = $_POST['id'];
            $nome       = $_POST['nome'];
            $telefone   = $_POST['telefone'];
            $email      = $_POST['email'];
            $senha      = $_POST['senha'];

            $sql = "UPDATE usuarios SET nome = :nome, telefone = :telefone, email = :email, senha = :senha WHERE id = :id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

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
    <h2>Cadastro Atualizado com Sucesso</h2>
    <button onclick="history.go(-3);">Retornar</button>
    </body>
    </html>';
            }

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }else{
        echo "Você não tem permissão para acessar o site";
    }
    ?>
</body>
</html>