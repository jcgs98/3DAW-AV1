<?php
if (($_POST) && (!empty($_POST["submit"])))
{
    $con = mysqli_connect("localhost", "root", "", "av1");
	
	if (file_exists($_POST["csv"])) {
    
		$arquivo = fopen($_POST["csv"], 'r');
		
		$DATA = fgetcsv($arquivo, 0, ';', '"');
		
        while (!feof($arquivo))
        {
            $DATA = fgetcsv($arquivo, 0, ';', '"');

            if (!$DATA) continue;

            $query = mysqli_query($con, "INSERT INTO produto (NOME, DESCRICAO, PRECO, QUANTIDADE, PESO) VALUES ('$DATA[0]', '$DATA[1]', '$DATA[2]', '$DATA[3]', '$DATA[4]')");
        }

        echo "<script>alert('Inserção realizada com sucesso!')</script>";

        fclose($arquivo);
    }    
	else echo "<script>alert('Arquivo não existe!')</script>";
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
					<a href="criarCliente.php" class="btn btn-primary">Criar	cliente		</a>
					<a href="alterCliente.php" class="btn btn-primary">Alterar	cliente		</a>
					<a href="listaCliente.php" class="btn btn-primary">Listar	clientes	</a>
					<a href="buscaCliente.php" class="btn btn-primary">Buscar	cliente		</a>
					<a href="excluCliente.php" class="btn btn-primary">Excluir	cliente		</a>
				</div>
			</div>
			<div class="card text-center mt-1">
				<div class="card-body">
					<form class="mt-1" method="POST" action="cargaProduto.php" enctype="multipart/form-data">				
						<input type="text" 		name="csv" multiple="" placeholder="Arquivo"><br><br>
						<input type="submit"	name="submit"	class		=	"btn btn-primary"		value	=	"Enviar">						
						
                    </form>
				</div>
			</div>
		</div>
	</body>
</html>