<?php
    class conexao{
        public $pdo;
        function __construct(){
            echo "<br>Conexao ->";
             
            try{
                $user = 'root';
                $pass = '';
                $dsn ='mysql:dbname=gerenciador_tarefas;host=127.0.0.1;port=3307';
                $this-> pdo = new PDO($dsn, $user, $pass); //$this-> indica o atributo $pdo criado anteriormente      
              
            }catch(PDOException $e)
            {
                die ("Erro".$e);
            }
            

            
        }
    }
?>