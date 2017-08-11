<?php
//controlador da agenda


function cadastrar($nome){
        
    $contatos_auxiliar = pegarContatinhos(); // manipulação de arquivos.
    

	$contato = [
              'id' => uniqid(),
              'nome'     =>     $_POST['nome'],
              'email'    =>     $_POST['email'],
              'telefone' =>     $_POST['telefone'],
	];

	array_push($contatos_auxiliar, $contato);
       salvarArq($contatosAuxiliar);
        

    }
    
    function pegarContatinhos(){ // função que manipula de arquivos
	
	$contatos_auxiliar = file_get_contents('contatinhos.json');
	$contatos_auxiliar = json_decode($contatos_auxiliar, true);
    
	return $contatos_auxiliar;
	}
    
    function salvarArq($contatosAuxiliar){ // funçaõ que manipula arquivos.
        
    $contatosJson = json_encode($contatos_auxiliar, JSON_PRETTY_PRINT);
    file_put_contents('contatinhos.json', $contatosJson);
    header("Location: agenda_index.php");
}
    
    
    
    function buscarContatos($busca){
		
		$todosContatos = pegarContatinhos(); //manipulação de arquivos.
        
		$contatinhos_encontrados = [];

        foreach ($todosContatos as $contato) { //iteração
            
            if (strtolower($contato['nome']) == strtolower($busca)) {
                $contatinhos_encontrados[] = $contato;
            }
        
        }

		return $contatinhos_encontrados;
	}
    
    function excluirContatinhos($id){
        
        $contatos_auxiliar = pegarContatinhos(); //manipulação de arquivos.
        
        foreach ($contatos_auxiliar as $posicao => $contato){ //iteração
            if($id == $contato['id']) {
                unset($contatos_auxiliar[$posicao]);
            }
        }
        salvarArq($contatosAuxiliar);
    }
    
    
    function carregarContatinhos($id){
        
        $contatos_auxiliar = pegarContatinhos(); //manipulação de arquivos.
        
        foreach ($contatos_auxiliar as $contato){ //iteração
            if ($contato['id'] == $id){
                return $contato;
            }
        }
    }


    function salvarContatinhosEdit($id, $nome, $email, $telefone){
        
        $contatos_auxiliar = pegarContatinhos(); //manipulação de arquivos.
        
        
        foreach ($contatos_auxiliar as $posicao => $contato){ //iteração
            if ($contato['id'] == $id){
                
                $contatos_auxiliar[$posicao]['nome'] = $nome;
                $contatos_auxiliar[$posicao]['email'] = $email;
                $contatos_auxiliar[$posicao]['telefone'] = $telefone;
                
                break;
            }
        }
        
        salvarArq($contatosAuxiliar);
    }
    
    
    //ROTAS
    if ($_GET['acao'] == 'cadastrar'){
        cadastrar($_POST['nome']);
    }
        elseif ($_GET['acao'] == 'excluir'){
        excluirContatinhos($_GET['id']);
    
    } 
    elseif ($_GET['acao'] == 'editar'){
        salvarContatinhosEdit($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['telefone']);
    }
    
    
