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
			$query = mysqli_query($con, "DELETE FROM clientes WHERE (CPF = '$CPF' OR NOME='$NOME' OR ENDERECO = '$ENDERECO' OR CEP ='$CEP' OR ESTADO = '$ESTADO' OR CIDADE = '$CIDADE')");			
			if ($query) {				
				echo "<script>alert('Cliente Excluído!')</script>";			
			}
			else {
				echo "<script>alert('Erro ao apagar registro!')</script>";
			}
		}
		else {
			echo "<script>alert('Cliente não existe ou já excluído!')</script>";		
		}
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
					<a href="alterCliente.php" 	class="btn btn-primary">Alterar	cliente		</a>
					<a href="listaCliente.php" 	class="btn btn-primary">Listar	clientes	</a>					
					<a href="buscaCliente.php" 	class="btn btn-primary">Buscar	cliente		</a>
					<a href="index.php"			class="btn btn-primary">Início				</a>
				</div>
			</div>
		</div>	

        <div class="container">                
            <div class="card text-center mt-1">                
                <div class="card-body">                    
                    <form class="mt-2" method="POST" action="excluCliente.php">
                        <input type="text" name="NOME" placeholder="Nome">                   
                        <input type="text" name="CPF" placeholder="CPF">
						<input type="text" name="ENDERECO"placeholder="Endereço">	<br><br>					
						<input type="text" name="CEP"placeholder="CEP">                        
                        <input type="text" name="CIDADE"placeholder="Cidade">
						<input type="text" name="ESTADO"placeholder="UF">	<br><br>					
                        <input type="submit" 	name="delete"	class		=	"btn btn-primary"		value	=	"Apagar Cliente">                        
                    </form>                    
                </div>                
            </div>
        </div>
  </body>
</html>
