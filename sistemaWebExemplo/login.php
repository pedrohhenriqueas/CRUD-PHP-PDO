<?php

    // Conexão via método POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "base_trabalho_01";

        $conn = mysqli_connect($host, $user, $pass, $db);

        //Tentativa de conexão com o banco de dados
        if(!$conn){
            die('<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Aula Bootstrap</title>
    </head>
    <body class="text-center">
        <form method="post" class="form-signin" action="login.php">
        <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
            </label>
        </div>
        <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; David Barreto - 2023</p>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
                    </div>
                    <div class="modal-body">Falha na conexão: ' . mysqli_connect_error() . '</div>
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
</html>');
        }else{

            //Captura de valores via POST
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            //Retornar registros encontrados na tabela
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $emailSQL = $row['email'];
                $senhaSQL = $row['senha'];
                if($senha == $senhaSQL){
                    //Redirecionando par o site principal
                    session_start();
                    $_SESSION["email"]  = $emailSQL;
                    $_SESSION["senha"]  = $senhaSQL;

					header("Location: sistema.php");
                }else{
                    echo '<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/login.css">
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center">
		<form method="post" class="form-signin" action="login.php">
	      <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
	      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
	      <label for="inputEmail" class="sr-only">Endereço de email</label>
	      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
	      <label for="inputPassword" class="sr-only">Senha</label>
	      <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
	      <div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Lembrar de mim
	        </label>
	      </div>
	      <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
	      <p class="mt-5 mb-3 text-muted">&copy; David Barreto - 2023</p>
	    </form>

		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
                </div>
				<div class="modal-body">
				  Email ou senha inválidos!
				</div>
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
		<link rel="stylesheet" href="css/login.css">
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center">
		<form method="post" class="form-signin" action="login.php">
	      <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
	      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
	      <label for="inputEmail" class="sr-only">Endereço de email</label>
	      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
	      <label for="inputPassword" class="sr-only">Senha</label>
	      <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
	      <div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Lembrar de mim
	        </label>
	      </div>
	      <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
	      <p class="mt-5 mb-3 text-muted">&copy; David Barreto - 2023</p>
	    </form>

		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
				</div>
				<div class="modal-body">
				  Esmail ou senha inválidos
				</div>
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
        }
    }else{
        echo '<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/login.css">
		<title>Aula Bootstrap</title>
	</head>
	<body class="text-center">
		<form method="post" class="form-signin" action="login.php">
	      <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
	      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
	      <label for="inputEmail" class="sr-only">Endereço de email</label>
	      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" required autofocus>
	      <label for="inputPassword" class="sr-only">Senha</label>
	      <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
	      <div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Lembrar de mim
	        </label>
	      </div>
	      <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
	      <p class="mt-5 mb-3 text-muted">&copy; David Barreto - 2023</p>
	    </form>

		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Erro de conexão</h5>
				</div>
				<div class="modal-body">
				  Você não term permissão para acessar esta página!
				</div>
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

mysqli_close($conn);
?>