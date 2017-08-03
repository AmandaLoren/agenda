<?php
//controlador da agenda


    function cadastrar($nome){
        
    $contatos_auxiliar = file_get_contents('contatinhos.json'); // manipulação de arquivo = lê um arquivo .json
	$contatos_auxiliar = json_decode($contatos_auxiliar, true); // manipulação de arquivo = transforma um json em array
    

	$contato = [
              'id' => uniqid(),
              'nome'     =>     $_POST['nome'],
              'email'    =>     $_POST['email'],
              'telefone' =>     $_POST['telefone'],
	];

	array_push($contatos_auxiliar, $contato);

	$contatosJson = json_encode($contatos_auxiliar, JSON_PRETTY_PRINT); // manipulação de arquivo = transforma um array em formato json

	file_put_contents('contatinhos.json', $contatosJson); // manipulação de arquivo = salva os dados em um arquivo .json

	header("Location: index.php");
        
    }
    
    function pegarContatinhos(){
	
	$contatos_auxiliar = file_get_contents('contatinhos.json');  // manipulação de arquivo = lê um arquivo .json
	$contatos_auxiliar = json_decode($contatos_auxiliar, true); // manipulação de arquivo = transforma um json em array
    
	return $contatos_auxiliar;
	}
    
    
    function excluirContatinhos($id){
        $contatos_auxiliar = file_get_contents('contatinhos.json'); // manipulação de arquivo = lê um arquivo .json
        $contatos_auxiliar = json_decode($contatos_auxiliar, true); // manipulação de arquivo = transforma um json em array
        foreach ($contatos_auxiliar as $posicao => $contato){
            if($id == $contato['id']) {
                unset($contatos_auxiliar[$posicao]);
            }
        }
        $contatosJson = json_encode($contatos_auxiliar, JSON_PRETTY_PRINT);// manipulação de arquivo = transforma um array em formato json
        file_put_contents('contatinhos.json', $contatosJson); // manipulação de arquivo = salva os dados em um arquivo .json
        header('Location: index.php');
    }
    
    
    function carregarContatinhos($id){
        $contatos_auxiliar = file_get_contents('contatinhos.json');  // manipulação de arquivo = lê um arquivo .json
        $contatos_auxiliar = json_decode($contatos_auxiliar, true); // manipulação de arquivo = transforma um json em array
        
        
        foreach ($contatos_auxiliar as $contato){
            if ($contato['id'] == $id){
                return $contato;
            }
        }
    }


    function salvarContatinhosEdit($id, $nome, $email, $telefone){
        $contatos_auxiliar = file_get_contents('contatinhos.json'); // manipulação de arquivo = lê um arquivo .json
        $contatos_auxiliar = json_decode($contatos_auxiliar, true); // manipulação de arquivo = transforma um json em array
        
        
        foreach ($contatos_auxiliar as $posicao => $contato){
            if ($contato['id'] == $id){
                
                $contatos_auxiliar[$posicao]['nome'] = $nome;
                $contatos_auxiliar[$posicao]['email'] = $email;
                $contatos_auxiliar[$posicao]['telefone'] = $telefone;
                
                break;
            }
        }
        
        $contatosJson = json_encode($contatos_auxiliar, JSON_PRETTY_PRINT); // manipulação de arquivo = transforma um array em formato json
        file_put_contents('contatinhos.json', $contatosJson); // manipulação de arquivo = salva os dados em um arquivo .json
        header('Location: index.php');
    }
    
    
    //ROTAS
        if ($_GET['acao'] == 'cadastrar'){
            cadastrar($_POST['nome']);
        }
            elseif ($_GET['acao'] == 'excluir'){
            excluirContatinhos($_GET['id']);
        
        } 

        elseif ($_GET['acao'] == 'salvar_cont_editado'){
            salvarContatinhosEdit($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['telefone']);
        }
        
