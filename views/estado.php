<?php
   
    class EstadoView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new EstadoController();
            $retorno = $this->controlador->despachar($uri,$metodo);
            
            if(count($uri)==1){
                if($metodo == 'GET')
                return $this -> listar($retorno);
                elseif ($metodo == 'POST')
                return  $this -> post($retorno);
                
            }
            elseif(count($uri)==2){
                if($metodo == 'GET')
                return $this -> get($retorno);//fazer retorno
            
                elseif ($metodo == 'PUT')
                return  $this -> put($retorno);
                
                elseif ($metodo == 'DELETE')
                return  $this -> delete($retorno);
                
            }
            
           
        }
        function listar ($estado){
            echo "<br>----------------Estados Cadastrados:----------------<br>";
        
            $items = count($estado);
    
            for($num = 0; $num < $items; $num += 1){
                echo  $estado[$num]['id_estado']." | ";
                echo  $estado[$num]['id_task']." | ";
                echo  $estado[$num]['tipo_estado']. " | <br>";
            }
        }
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de novo Estado realizado com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a novo estado.";
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
        function get ($estado){
            echo "<br>Get Estado no ID especificado |";
           foreach($estado as $task){
            echo "<br>";
            echo  $task['id_estado']." | ";
            echo  $task['id_task']." | ";
            echo  $task['tipo_estado']. " | <br>";
           }
        }
    }









?>