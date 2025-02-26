<?php
   
    class EtiquetaView {
        private $controlador,$retorno;
        function __construct ($uri, $metodo){
            $this ->controlador = new EtiquetaController();
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
        function listar ($etiqueta){
            echo "<br>----------------Estiquetas Cadastradas:----------------<br>";
            $items = count($etiqueta);
            for($num = 0; $num < $items; $num += 1){
                echo  $etiqueta[$num]['id_etiqueta']." | ";
                echo  $etiqueta[$num]['id_task']." | ";
                echo  $etiqueta[$num]['cor']." | ";
                echo  $etiqueta[$num]['nome_etiqueta']." | <br> ";
                
            }
        }
        function post ($valor){
            echo "<br>Post | Cadastrar |";
           
            if($valor){
                echo "<br> Cadastro de nova Etiqueta realizado com sucesso!";
            }else{
                echo "<br> Erro ao tentar cadastrar a nova etiqueta.";
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
            echo "<br>------Get Etiqueta no ID especificado------";
            foreach($estado as $task){
                echo "<br>";
                echo  $task['id_etiqueta']." | ";
                echo  $task['id_task']." | ";
                echo  $task['cor']." | ";
                echo  $task['nome_etiqueta']." | <br> ";
               }
        }
    }

?>