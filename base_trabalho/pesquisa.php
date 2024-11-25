<?php

    $nome = $telefone = $email = $senha = "";

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

            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row){
                $nome = $row['nome'];
                $telefone = $row['telefone'];
                $email = $row['email'];
                $senha = $row['senha'];
            }else{
                $nome = $telefone = $email = $senha = "";
            }
        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt0br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pesquisa e Atualização</title>
</head>
<body>
    <h2>Atualizar cadastro</h2>
    
    <!-- Formulário de pesquisa do usuário por id -->

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <p>
            ID: <input type="tex" name="id">
            <input type="submit" value="Pesquisar">
        </p>
    </form>

    <?php 
        if(!empty($nome)) { ?> 
        <!-- Formulário de atualização do usuário -->
        <form method="post" action="atualiza.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <p>
                Nome:<br>
                <input type="text" name="nome", value="<?php echo $nome; ?>">
            </p>

            <p>
                Telefone:<br>
                <input type="text" name="telefone", value="<?php echo $telefone; ?>">
            </p>

            <p>
                Email:<br>
                <input type="email" name="email", value="<?php echo $email; ?>">
            </p>
            
            <p>
                Senha:<br>
                <input type="password" name="senha", value="<?php echo $senha; ?>">
            </p>

            <p>
                Nome:<br>
                <input type="submit" value="Atualizar Cadastro">
            </p>
        </form>
    <?php } ?>
</body>
</html>