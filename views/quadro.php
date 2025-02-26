<?php
   
    class QuadroView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new QuadroController();
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
        function listar ($quadro){
            echo "<br>----------------Lista de Quadros :----------------<br>";
            $items = count($quadro);
            for($num = 0; $num < $items; $num += 1){
                echo  $quadro[$num]['id_quadro']." | ";
                echo  $quadro[$num]['id_listaTarefas']." | ";
                echo  $quadro[$num]['nome_quadro']. " | <br>";
            }
        }
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de novo Quadro realizado com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a novo Quadro.";
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
        function get ($quadro){
            echo "<br>--------Get Quadro no ID especificado--------";
            foreach($quadro as $task){
                echo "<br>";
                echo  $task['id_quadro']." | ";
                echo  $task['id_listaTarefas']." | ";
                echo  $task['nome_quadro']. " | <br>";
               }
        }
    }

?>