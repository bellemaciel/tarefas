<?php
	require_once "views/tarefa.php";
	require_once "controlador/controlador.php";
	require_once "controlador/conexao.php";
	require_once "controlador/tarefa.php";
	require_once "controlador/usuario.php";
	require_once "controlador/estado.php";
	require_once "controlador/quadro.php";
	require_once "controlador/listatarefas.php";
	require_once "controlador/prioridade.php";
	require_once "controlador/etiqueta.php";

	$metodo = $_SERVER["REQUEST_METHOD"];
	$uri = explode("?",$_SERVER["REQUEST_URI"])[0];
	$uri = preg_replace(['/\/{2,}/','/\/$/','/^\//'],['/','',''],$uri);
	$uri = explode("/",$uri);
	//remover primeiro elemento vazio
	//remover barras excessivas
	//remover um conjunto de elementos previos
	if ($metodo=="PUT") {
		parse_str(file_get_contents('php://input'),$_PUT);
	}
	//array_shift($uri);
	array_shift($uri);
	var_dump($uri);
	echo "<br>$metodo";
	echo "<br>Index->";

	try{
		if(isset($uri[0])){
			$nome = ucfirst($uri[0])."View";//trocar para "Controller" para "View"
			if(class_exists($nome))
				$controlador = new $nome($uri, $metodo);
			else
				throw new Exception("Indice Inexistente");
		}	
		
	}
	catch (Exception $e){
		echo "Página não encontrada!";
	}
	/*
	if ($uri[0] == "tarefa"){
		$controlador = new TarefaController($uri, $metodo);
		
	}elseif($uri[0] == "usuario"){
		$controlador = new UsuarioController($uri, $metodo);
		
	}elseif($uri[0] == "etiqueta"){
		$controlador = new EtiquetaController($uri, $metodo);
		
	}elseif($uri[0] == "prioridade"){
		$controlador = new PrioridadeController($uri, $metodo);
		
	}elseif($uri[0] == "estado"){
		$controlador = new EstadoController($uri, $metodo);
		
	}elseif($uri[0] == "listatarefas"){
		$controlador = new ListatarefasController($uri, $metodo);
		
	}elseif($uri[0] == "quadro"){
		$controlador = new QuadroController($uri, $metodo);
		
	}
	*/

?>