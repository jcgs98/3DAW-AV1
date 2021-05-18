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
					<a href="excluCliente.php" 	class="btn btn-primary">Excluir	cliente		</a>
					<a href="index.php"			class="btn btn-primary">Início				</a>
				</div>
			</div>
		</div>
		<div class="container">
		<div class="card text-center mt-1">
			<div class="card-body">
				<form class="mt-1" method="POST" action="buscaCliente.php">	
					<input type="text"		name="NOME"		placeholder	=	"Nome">
					<input type="text"		name="CPF"		placeholder	=	"CPF">
					<input type="text"		name="ENDERECO"	placeholder	=	"Endereço">	<br><br>
					<input type="text"		name="CEP"		placeholder	=	"CEP">
					<input type="text"		name="CIDADE"	placeholder	=	"Cidade">
					<input type="text"		name="ESTADO"	placeholder	=	"UF">		<br><br>
					<input type="submit" 	name="submit"	class		=	"btn btn-primary"		value	=	"Buscar Cliente">
				</form>
			</div>
		</div>
					<?php
						$con = mysqli_connect("localhost", "root", "", "av1");                     
						if (($_POST) && ($_POST['submit'])) {
							$NOME		="NOME";	
							$CPF		="CPF";
							$ENDERECO	="ENDERECO";
							$CEP		="CEP";
							$CIDADE		="CIDADE";
							$ESTADO		="ESTADO";
						
							$NOME		=($NOME!="")		?$_POST["NOME"]		:"NOME";
							$CPF		=($CPF!="")			?$_POST["CPF"]		:"CPF";
							$ENDERECO	=($ENDERECO!="")	?$_POST["ENDERECO"]	:"ENDERECO";
							$CEP		=($CEP!="")			?$_POST["CEP"]		:"CEP";
							$CIDADE		=($CIDADE!="")		?$_POST["CIDADE"]	:"CIDADE";
							$ESTADO		=($ESTADO!="")		?$_POST["ESTADO"]	:"ESTADO";		
                     
							if ($NOME.$CPF.$ENDERECO.$CEP.$CIDADE.$ESTADO){
								$sql = "SELECT ID, NOME, CPF, ENDERECO, CEP, CIDADE, ESTADO
									FROM clientes
									WHERE 	1=1
									AND NOME		LIKE	'%".$NOME."%'
									AND CPF			LIKE	'%".$CPF."%'
									AND ENDERECO	LIKE	'%".$ENDERECO."%'
									AND CIDADE		LIKE	'%".$CIDADE."%'
									AND CEP			LIKE	'%".$CEP."%'
									AND ESTADO		LIKE	'%".$ESTADO."%'
									ORDER BY NOME ASC";
									
								$resultado = mysqli_query($con,$sql);
						 
								if (mysqli_num_rows($resultado)) {?>
									<table class="table table-sm mt-1">
								<thead>
									<tr>
										<th>Nome</th>
										<th>CPF</th>
										<th>Endereço</th>
										<th>CEP</th>
										<th>Cidade</th>
										<th>UF</th>
									</tr>
								</thead> <?php
									while ($linha = mysqli_fetch_assoc($resultado)) {
					?>
							
								<tbody		
							<tr>								
								<td><?php echo $linha['NOME']; ?></td>
								<td><?php echo $linha['CPF']; ?></td>
								<td><?php echo $linha['ENDERECO']; ?></td>
								<td><?php echo $linha['CEP']; ?></td>
								<td><?php echo $linha['CIDADE']; ?></td>
								<td><?php echo $linha['ESTADO']; ?></td>
							</tr>
					<?php
									}
								}
								else {echo "<script>alert('Cliente não existe!')</script>";}
							}
							else {echo "<script>alert('Preencha algum campo!')</script>";}
					?>
			</tbody>
		</table>
					<?php
						}
                    ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
