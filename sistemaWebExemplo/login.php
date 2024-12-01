<?php

    // Conexão via método POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "base_trabalho";

		try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $email = $_POST['email'];
			$senha = $_POST['senha'];

            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row){
                $emailPDO = $row['email'];
                $senhaPDO = $row['senha'];

				if($senha == $senhaPDO){
					session_start();
					$_SESSION['email'] = $emailPDO;
					header("Location: sistema.php");
				} else {

					echo '<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center" style="background-color: rgb(34, 34, 34)">
		<form method="post" class="form-signin" action="login.php">
			<h1 class="h3 mb-3 font-weight-normal" style="color: white">Faça login</h1>
			<div class="login-inputs">
			<label for="inputEmail" class="sr-only">Endereço de email</label>
			<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
			</div>
			<button class="form-control" type="submit" style="    
				margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;
				margin-top: 15px;"


			>Login</button>
			<p class="mt-5 mb-3 text-muted">&copy; Pedro Santos - 2024</p>
		</form>


		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
					</div>
					<div class="modal-body">Email ou senha inválidos</div>
					<div class="modal-footer">
					<a href="login.html" class="btn btn-savage" data-bs-dismiss="modal">Retornar</a>
					</div>
				</div>
			</div>
		</div>


		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		<script>
			$("#modal").modal("show")
		</script>
	</body>
</html>';

				}
				
            }else{ 
                
				echo '<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center" style="background-color: rgb(34, 34, 34)">
		<form method="post" class="form-signin" action="login.php">
	      <h1 class="h3 mb-3 font-weight-normal" style="color: white">Faça login</h1>
	      <div class="login-inputs">
			<label for="inputEmail" class="sr-only">Endereço de email</label>
			<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
		  </div>
	      <button class="form-control" type="submit" style="    
				margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;
				margin-top: 15px;"


			>Login</button>
	      <p class="mt-5 mb-3 text-muted">&copy; Pedro Santos - 2024</p>
	    </form>


		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
					</div>
					<div class="modal-body">Email ou senha inválidos</div>
					<div class="modal-footer">
					<a href="login.html" class="btn btn-savage" data-bs-dismiss="modal">Retornar</a>
					</div>
				</div>
			</div>
		</div>


		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		<script>
			$("#modal").modal("show")
		</script>
	</body>
</html>';

            }
        }catch(PDOException $e){

			echo '<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center" style="background-color: rgb(34, 34, 34)">
		<form method="post" class="form-signin" action="login.php">
			<h1 class="h3 mb-3 font-weight-normal" style="color: white">Faça login</h1>
			<div class="login-inputs">
			<label for="inputEmail" class="sr-only">Endereço de email</label>
			<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
			</div>
			<button class="form-control" type="submit" style="    
				margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;
				margin-top: 15px;"


			>Login</button>
			<p class="mt-5 mb-3 text-muted">&copy; Pedro Santos - 2024</p>
		</form>


		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
					</div>
					<div class="modal-body">Erro: ' . $e->getMessage() . '</div>
					<div class="modal-footer">
					<a href="login.html" class="btn btn-savage" data-bs-dismiss="modal">Retornar</a>
					</div>
				</div>
			</div>
		</div>


		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		<script>
			$("#modal").modal("show")
		</script>
	</body>
</html>';

        }

	}else{
		echo '<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center" style="background-color: rgb(34, 34, 34)">
		<form method="post" class="form-signin" action="login.php">
	      <h1 class="h3 mb-3 font-weight-normal" style="color: white">Faça login</h1>
	      <div class="login-inputs">
			<label for="inputEmail" class="sr-only">Endereço de email</label>
			<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required style="    margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;">
		  </div>
	      <button class="form-control" type="submit" style="    
				margin: 0 auto;
				height: 40px;
				width: 250px;
				border-radius: 8px;
				border: 1px solid #555;
				background-color: #2c2c2c;
				color: #fff;
				padding: 0 10px;
				font-size: 16px;
				outline: none;
				transition: all 0.3s ease;
				margin-top: 15px;"


			>Login</button>
	      <p class="mt-5 mb-3 text-muted">&copy; Pedro Santos - 2024</p>
	    </form>


		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
					</div>
					<div class="modal-body">Você não tem permissão para acessar o site</div>
					<div class="modal-footer">
					<a href="login.html" class="btn btn-savage" data-bs-dismiss="modal">Retornar</a>
					</div>
				</div>
			</div>
		</div>


		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		<script>
			$("#modal").modal("show")
		</script>
	</body>
</html>';
	}


       
?>