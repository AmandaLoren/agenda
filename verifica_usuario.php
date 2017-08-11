<?php

session_start();

function login(){

    $login = $_POST['login'];
    $senha = $_POST['senha'];

	if ($login == "admin" && $senha == "admin") {
	 
     $_SESSION['usuario_nome']   = $_POST['nome'];
     $_SESSION['usuario_login']  = $login;
     $_SESSION['usuario_senha']  = $senha;
     $_SESSION['usuario_online'] = true;
     $usuario_existe = ($_SESSION['usuario_online'] = true);

        header('Location: agenda_index.php');
    }
    elseif ($usuario_existe == false){
        header('Location: login.php');
    }
}

function logout(){
    session_destroy();
    header('location: login.php');
}

if ($_GET["acao"] == 'login'){
    login();
} elseif($_GET["acao"] == 'logout') {
    logout();
}
