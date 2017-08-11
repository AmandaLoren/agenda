<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<title>login</title>
</head>
<body>
	
	<div class="form-login">

		<form method="post" action="verifica_usuario.php?acao=">
			
			<input type="text" required name="nome" placeholder="Digite seu nome completo">
			<br />
			<input type="text"     name="login" placeholder="Digite seu login">
			<br />
			<input type="password" name="senha" placeholder="Digite sua senha">
			<br />
			<input type="submit"   name="login_form" value="Acessar">

		</form>

	</div>
	
</body>
</html>
