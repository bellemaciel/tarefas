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
                return  $this -> post();
                
            }
            elseif(count($uri)==2){
                if($metodo == 'GET')
                return $this -> get($uri[1]);//fazer retorno
            
                elseif ($metodo == 'PUT')
                return  $this -> put($uri[1]);
                
                elseif ($metodo == 'DELETE')
                return  $this -> delete($uri[1]);
                
            }
            
           
        }
        function listar ($tarefa){
            echo "<br>----------------Tarefas Cadastradas:----------------<br>";
        //var_dump($tarefa);

        $items = count($tarefa);

        // Loop through array
        for($num = 0; $num < $items; $num += 1){
            echo  $tarefa[$num]['id_task']." | ";
            echo  $tarefa[$num]['nome_task']." | ";
            echo  $tarefa[$num]['descricao']." | ";
            echo  $tarefa[$num]['data_inicio']." | ";
            echo  $tarefa[$num]['data_fim']." | ";
            echo  $tarefa[$num]['dataFimEstimada']. " | <br>";
        }}
        function post (){}
        function put (){}
        function delete (){}
        function get (){}
    }









?>