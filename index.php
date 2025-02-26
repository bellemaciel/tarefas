<?php
	require_once "views/quadro.php";
	require_once "views/prioridade.php";
	require_once "views/listatarefas.php";
	require_once "views/etiqueta.php";
	require_once "views/estado.php";
	require_once "views/tarefa.php";
	require_once "views/usuario.php";
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
		echo "INDEX: Página não encontrada!";
	}
	

?>