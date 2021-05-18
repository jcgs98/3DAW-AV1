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
					<a href="buscaCliente.php" class="btn btn-primary">Buscar	cliente		</a>
					<a href="excluCliente.php" class="btn btn-primary">Excluir	cliente		</a>
					<a href="index.php" class="btn btn-primary">Início </a>
				</div>				
			</div>
		</div>
	<?php
		include "conexao.php";
	?>        
		<div class="container">
			<div class="card text-left mt-1">				
				<div class="card-body">					
                    <table class="table table-sm mt-1">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Endereço</th>
								<th>CEP</th>
								<th>Cidade</th>
								<th>Estado</th>                                                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $Exibe = mysqli_query($con, "SELECT NOME, CPF, ENDERECO, CEP, CIDADE, ESTADO FROM clientes ORDER BY NOME");
                                while($r = mysqli_fetch_array($Exibe)):
							?>
                                    <tr>
                                        <td><?php echo $r['NOME']; ?></td>
										<td><?php echo $r['CPF']; ?></td>
										<td><?php echo $r['ENDERECO']; ?></td>
										<td><?php echo $r['CEP']; ?></td>
										<td><?php echo $r['CIDADE']; ?></td>
										<td><?php echo $r['ESTADO']; ?></td>                                                                                
                                    </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
				</div>
			</div>			
		</div>       
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>