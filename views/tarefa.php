<?php
   
    class TarefaView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new TarefaController();
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
        function listar ($tarefa){
            echo "<br>----------------Tarefas Cadastradas:----------------<br>";

        $items = count($tarefa);

        for($num = 0; $num < $items; $num += 1){
            echo  $tarefa[$num]['id_task']." | ";
            echo  $tarefa[$num]['nome_task']." | ";
            echo  $tarefa[$num]['descricao']." | ";
            echo  $tarefa[$num]['data_inicio']." | ";
            echo  $tarefa[$num]['data_fim']." | ";
            echo  $tarefa[$num]['dataFimEstimada']. " | <br>";
        }}
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de nova Tarefa realizado com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a nova tarefa.";
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
        function get ($tarefa){
            
            foreach($tarefa as $task){
                echo "<br>";
                echo  $task['id_task']." | ";
                echo  $task['nome_task']." | ";
                echo  $task['descricao']." | ";
                echo  $task['data_inicio']." | ";
                echo  $task['data_fim']." | ";
                echo  $task['dataFimEstimada']. " | <br>";
               }
            
        }
    }









?>