<?php
	$con = mysqli_connect("localhost", "root", "", "av1");
	
	if (isset($_POST['delete'])) {
		$NOME = $_POST['NOME'];
		$CPF = $_POST['CPF'];
		$ENDERECO = $_POST['ENDERECO'];
		$CEP = $_POST['CEP'];
		$CIDADE = $_POST['CIDADE'];
		$ESTADO = $_POST['ESTADO'];
		
		$query = mysqli_query($con, "SELECT * FROM clientes WHERE (CPF = '$CPF' OR NOME='$NOME' OR ENDERECO = '$ENDERECO' OR CEP ='$CEP' OR ESTADO = '$ESTADO' OR CIDADE = '$CIDADE')");
		
		if (mysqli_num_rows($query)){
			$query = mysqli_query($con, "UPDATE clientes SET ENDERECO = '$ENDERECO', CEP ='$CEP', ESTADO = '$ESTADO', CIDADE = '$CIDADE' WHERE CPF = '$CPF';");			
			if ($query) {				
				echo "<script>alert('Cliente Atualizado!')</script>";
			}
			else {
				echo "<script>alert('Erro ao apagar registro!')</script>";
			}
		}
		else {
			echo "<script>alert('Cliente não existe ou já excluído!')</script>";		
		}
		
		header("location:listaCliente.php");
	}	
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
		<div class="container">
			<div class="card text-center mt-1">
				<div class="card-body">
					<a href="criarCliente.php" 	class="btn btn-primary">Criar	cliente		</a>
					<a href="excluCliente.php" 	class="btn btn-primary">Excluir	cliente		</a>
					<a href="listaCliente.php" 	class="btn btn-primary">Listar	clientes	</a>					
					<a href="buscaCliente.php" 	class="btn btn-primary">Buscar	cliente		</a>
					<a href="index.php"			class="btn btn-primary">Início				</a>
				</div>
			</div>
		</div>	

        <div class="container">                
            <div class="card text-center mt-1">                
                <div class="card-body">                    
                    <form class="mt-2" method="POST" action="alterCliente.php">
                        <input type="text" name="NOME" placeholder="Buscar por Nome"> <br><br>
                        <input type="text" name="CPF" placeholder="Buscar por CPF"> <br><br>
						<input type="text" name="ENDERECO"placeholder="Novo Endereço">
						<input type="text" name="CEP"placeholder="Novo CEP">                        
                        <input type="text" name="CIDADE"placeholder="Nova Cidade">
						<input type="text" name="ESTADO"placeholder="Nova UF">	<br><br>					
                        <input type="submit" 	name="delete"	class		=	"btn btn-primary"		value	=	"Atualizar Cliente">                        
                    </form>                    
                </div>                
            </div>
        </div>
  </body>
</html>