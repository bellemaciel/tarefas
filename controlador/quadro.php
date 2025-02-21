<?php
    //require "conexao.php";
   
    class QuadroController extends conexao {
       use Controlador;
    

    public function listar(){
        $quadro = $this-> pdo ->  query("SELECT * from quadro;") ->fetchAll();
        echo "<br>----------------Quadros Cadastrados:----------------<br>";
        

        $items = count($quadro);

        
        for($num = 0; $num < $items; $num += 1){
            echo  $quadro[$num]['id_quadro']." | ";
            echo  $quadro[$num]['id_listaTarefas']." | ";
            echo  $quadro[$num]['nome_quadro']. " | <br>";
        }
    } 
    public function get($id){
       $quadro = $this-> pdo -> query("SELECT * from quadro WHERE id_quadro = '$id'; ") ->fetchAll();
       
       $items = count($quadro);
       foreach($quadro as $task){
        echo "<br>";
        echo  $task['id_quadro']." | ";
        echo  $task['id_listaTarefas']." | ";
        echo  $task['nome_quadro']. " | <br>";
       }
    }
    public function post(){
        echo "Cadastrar";

        $verifica = ['nome_quadro'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        $valor = $this -> pdo -> query("INSERT INTO quadro ( `nome_quadro`) VALUES ('$_POST[nome_quadro]')");

        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
        
         
    }
    public function put($id){
        global $_PUT;
        
        echo "Atualizar: $id";
       
        $valor = $this -> pdo -> query("UPDATE quadro SET nome_quadro = '$_PUT[nome_quadro]' WHERE id_quadro ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";

        $valor = $this -> pdo -> query("SELECT id_quadro FROM quadro WHERE id_quadro='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM quadro WHERE id_quadro ='$id'; ");
            if($valor){
                echo "<br> Sucesso! ID: $id deletado.";
            }else{
                echo "<br> Erro";
            }  
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>