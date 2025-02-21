<?php
 trait Controlador {
    function despachar ($uri,$metodo){
        parent::__construct();//construtor pai (conexao), evita que subscreva o construtor atual
        echo "<br>Controlador Trait ->";

        if(count($uri)==1){
            if($metodo == 'GET')
               return $this -> listar();
            elseif ($metodo == 'POST')
                $this -> post();
            
        }
        elseif(count($uri)==2){
            if($metodo == 'GET')
            $this -> get($uri[1]);//fazer retorno
        
            elseif ($metodo == 'PUT')
                $this -> put($uri[1]);
            
            elseif ($metodo == 'DELETE')
                $this -> delete($uri[1]);
            
        }
    }
}










?>