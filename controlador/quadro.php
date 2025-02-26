<?php
    //require "conexao.php";
   
    class QuadroController extends conexao {
       use Controlador;
    

    public function listar(){
        return $this-> pdo ->  query("SELECT * from quadro;") ->fetchAll();
      
    } 
    public function get($id){
       return $this-> pdo -> query("SELECT * from quadro WHERE id_quadro = '$id'; ") ->fetchAll();
       
      
    }
    public function post(){
        $verifica = ['id_listaTarefas','nome_quadro'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("INSERT INTO quadro ( `id_listaTarefas`, `nome_quadro`) VALUES ('$_POST[id_listaTarefas]', '$_POST[nome_quadro]')");
                
    }
    public function put($id){
        global $_PUT;
        
        return $this -> pdo -> query("UPDATE quadro SET nome_quadro = '$_PUT[nome_quadro]' WHERE id_quadro ='$id';");
    }
    public function delete($id){
        $valor = $this -> pdo -> query("SELECT id_quadro FROM quadro WHERE id_quadro='$id'; ");
        
        if($valor){
            return $this -> pdo -> query("DELETE FROM quadro WHERE id_quadro ='$id'; "); 
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>