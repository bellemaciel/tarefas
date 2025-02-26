<?php
   
    class PrioridadeView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new PrioridadeController();
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
        function listar ($prioridade){
            echo "<br>----------------Lista de Prioridade :----------------<br>";
            $items = count($prioridade);
            for($num = 0; $num < $items; $num += 1){
                echo  $prioridade[$num]['id_prioridade']." | ";
                echo  $prioridade[$num]['id_task']." | ";
                echo  $prioridade[$num]['nivelPrioridade']. " | <br>";
            }
        }
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de nova Prioridade realizada com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a nova Prioridade.";
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
        function get ($prioridade){
            echo "<br>--------Get Prioridade no ID especificado--------";
            foreach($prioridade as $task){
                echo "<br>";
                echo  $task['id_prioridade']." | ";
                echo  $task['id_task']." | ";
                echo  $task['nivelPrioridade']. " | <br>";
               }
        }
    }

?>