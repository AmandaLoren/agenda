<?php

session_start();


    $logado = isset($_SESSION['usuario_online']);
    if ($logado == false){
    header('Location: login.php');
}
    require 'controlador_contatinhos.php';
    
    if(isset($_GET['nomeBuscado']) && !empty($_GET['nomeBuscado'])){
        $osContatinhos = buscarContatos($_GET['nomeBuscado']);
    } else {
        $osContatinhos = pegarContatinhos();
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agenda</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	
	<div class="container" style="margin-top: 30px;">

		<h3>MINHA AGENDA DE CONTATOS</h3>
		<br />
		
		<!-- CADASTRO-->
		<div class="row">
			<div class="col-md-12">
				<form class="form-inline" method="post" action="controlador_contatinhos.php?acao=cadastrar">
				  
				  <!--nome-->
				  <div class="form-group">
				    <label for="nome">Nome</label>
				    <input name="nome" type="text" class="form-control" id="nome">
				  </div>
				  
				  <!--email-->
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input name ="email" type="email" class="form-control" id="email">
				  </div>

				  <!--telefone-->
				  <div class="form-group">
				    <label for="telefone">Telefone</label>
				    <input name="telefone" type="text" class="form-control" id="telefone">
				  </div>
				  
				  <button type="submit" class="btn btn-info">CADASTRAR</button>
				
				</form>
			</div>
		</div>

		<br />
		
        <form class="form-inline" method="GET" action="">
			<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-12 control-label" for="nomeBuscado">Busque o contato:</label>  
				  <div class="col-md-4">
				  <input id="nomeBuscado" name="nomeBuscado" type="text"  class="form-control input-md">
				    
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-12 control-label" for="singlebutton"></label>
				  <div class="col-md-4">
				    <button id="submit" class="btn btn-info">Buscar</button>
				  </div>
				</div>

			</fieldset>
		</form>
        
		<!--CONTATOS-->
		<div class="row">
			<div class="col-md-12">

				<!-- Conteúdo -->
				<table class="table"> 
					<thead> 
						<tr> 
							<th>#</th> 
							<th>Nome</th> 
							<th>Email</th> 
							<th>Telefone</th> 
							<th>Ações</th> 
						</tr> 
					</thead> 
					<tbody> 
						<!-- repetir -->
                        <?php foreach($osContatinhos as $contato): ?>
						<tr> 
							<th scope="row"><?= $contato['id'] ?></th> 
							<td><?= $contato['nome'] ?></td> 
							<td><?= $contato['email'] ?></td> 
							<td><?= $contato['telefone'] ?></td>
                            <td>                    
                                <a href="controlador_contatinhos.php?acao=excluir&id=<?= $contato['id'] ?>"> Excluir </a> 
                                <a href="editContatinhos.php?id=<?= $contato['id']?>">Editar</a>                           
                            </td>   
						</tr>
                        <?php endforeach; ?>
					</tbody> 
				</table>
			</div>
		</div>
	</div>
</body>
</html>
