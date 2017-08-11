<?php
    require 'controlador_contatinhos.php';
    $contato = carregarContatinhos($_GET['id']);
   

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
	<title>Editar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <div class="container" style="margin-top: 30px;">  
    <form class="form-inline" method="POST" action="controlador_contatinhos.php?acao=editar">
        <input name="id" readonly    type="text" value="<?= $contato['id']?>" placeholder="Não é possível editar o ID">
        <input name="nome"       type="text" value="<?= $contato['nome']?>" >
        <input name="email"      type="email" value="<?= $contato['email']?>" >
        <input name="telefone"   type="text" value="<?= $contato['telefone']?>" >
        <input type="submit"      value="Editar">
</body>

</html>

