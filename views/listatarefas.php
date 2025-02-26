<?php
   
    class ListatarefasView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new ListatarefasController();
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
        function listar ($listatarefas){
            echo "<br>----------------Lista de Listas de Tarefas Cadastradas:----------------<br>";
        
            $items = count($listatarefas);

            for($num = 0; $num < $items; $num += 1){
                echo  $listatarefas[$num]['id_listaTarefas']." | ";
                echo  $listatarefas[$num]['id_task']." | ";
                echo  $listatarefas[$num]['nome_lista']. " | <br>";
            }
        }
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de nova Lista de Tarefas realizada com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a nova Lista de Tarefas.";
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
        function get ($listatarefas){
            echo "<br>--------Get Lista de Tarefas no ID especificado--------";
            foreach($listatarefas as $task){
                echo "<br>";
                echo  $task['id_listaTarefas']." | ";
                echo  $task['id_task']." | ";
                echo  $task['nome_lista']. " | <br>";
               }
        }
    }

?>