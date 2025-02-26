<?php
 trait Controlador {
    function despachar ($uri,$metodo){
        parent::__construct();//construtor pai (conexao), evita que subscreva o construtor atual
        echo "<br>Controlador Trait ->";

        if(count($uri)==1){
            if($metodo == 'GET')
               return $this -> listar();
            elseif ($metodo == 'POST'){
                return $this -> post(); }
                 
        }
        elseif(count($uri)==2){
            if($metodo == 'GET')
            return $this -> get($uri[1]);
        
            elseif ($metodo == 'PUT'){
                return $this -> put($uri[1]);
            }

            elseif ($metodo == 'DELETE')
                return $this -> delete($uri[1]);
            else{
                echo "<br> | Erro, digite a opção correta na uri.|";
            }
            
        }
    }
}










?>