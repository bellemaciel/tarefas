<?php
   
    class UsuarioView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new UsuarioController();
            $retorno = $this->controlador->despachar($uri,$metodo);
            
            if(count($uri)==1){
                if($metodo == 'GET')
                return $this -> listar($retorno);
                elseif ($metodo == 'POST')
                return  $this -> post($retorno);
                
            }
            elseif(count($uri)==2){
                if($metodo == 'GET')
                return $this -> get($retorno);
            
                elseif ($metodo == 'PUT')
                return  $this -> put($retorno);
                
                elseif ($metodo == 'DELETE')
                return  $this -> delete($retorno);  
            }           
        }
        function listar ($usuario){
            echo "<br>----------------Usuarios Cadastrados:----------------<br>";
            $items = count($usuario);
            for($num = 0; $num < $items; $num += 1){
                echo  $usuario[$num]['id_user']." | ";
                echo  $usuario[$num]['nome_user']." | <br> ";   
            }
        }
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de novo Usuario realizado com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a novo usuario.";
            }
        }
        function put ($valor){
            echo "<br>Put | Atualizar |";
            if($valor){
                echo "<br> Valor atualizado com sucesso!";
            }else{
                echo "<br> Erro";
            }
        }
        function delete ($valor){
            echo "<br>Delete | Apagar |";
            if($valor){
                echo "<br> Sucesso! ID: __ deletado.";
            }else{
                echo "<br> Erro!";
            }  
        }
        function get ($usuario){
            
            foreach($usuario as $task){
                echo "<br>";
                echo  $task['id_user']." | ";
                echo  $task['nome_user']." |<br> ";
               }
        }
    
    }
?>