<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="card text-center mt-1">
				<div class="card-body">					
					<a href="alterCliente.php" 	class="btn btn-primary">Alterar	cliente		</a>
					<a href="listaCliente.php" 	class="btn btn-primary">Listar	clientes	</a>					
					<a href="excluCliente.php" 	class="btn btn-primary">Excluir	cliente		</a>
					<a href="buscaCliente.php"	class="btn btn-primary">Buscar	cliente		</a>
					<a href="index.php"			class="btn btn-primary">Início				</a>
				</div>
			</div>
		</div>
		<div class="container">
		<div class="card text-center mt-1">
			<div class="card-body">
				<form class="mt-1" method="POST" action="criarCliente.php">	
					<input type="text"		name="NOME"		placeholder	=	"Nome">
					<input type="text"		name="CPF"		placeholder	=	"CPF">
					<input type="text"		name="ENDERECO"	placeholder	=	"Endereço">	<br><br>
					<input type="text"		name="CEP"		placeholder	=	"CEP">
					<input type="text"		name="CIDADE"	placeholder	=	"Cidade">
					<input type="text"		name="ESTADO"	placeholder	=	"UF">		<br><br>
					<input type="submit" 	name="submit"	class		=	"btn btn-primary"		value	=	"Criar Cliente">
				</form>
			</div>
		</div>		
					<?php
						$con = mysqli_connect("localhost", "root", "", "av1");                     
						if (($_POST) && ($_POST['submit'])) {
							$NOME		= $_POST['NOME'];
							$CPF		= $_POST['CPF'];
							$ENDERECO	= $_POST['ENDERECO'];
							$CEP		= $_POST['CEP'];
							$CIDADE		= $_POST['CIDADE'];
							$ESTADO		= $_POST['ESTADO'];			
							$CONCA		= $NOME.$CPF.$ENDERECO.$CEP.$CIDADE.$ESTADO;
							echo($NOME!=""&&$CPF!=""&&$ENDERECO!=""&&$CEP!=""&&$CIDADE!=""&&$ESTADO!="")?
								(mysqli_query($con, "	INSERT INTO clientes (ID, NOME, CPF, ENDERECO, CEP, CIDADE, ESTADO )
														VALUES ('$CONCA','$NOME','$CPF', '$ENDERECO', '$CEP', '$CIDADE', '$ESTADO')"))?
								"<script>alert('Aluno inserido com sucesso!')</script>":
								"<script>alert('Erro, aluno não inserido!')</script>":
								"<script>alert('Preencha todos os campos!')</script>";
						}
                    ?>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
