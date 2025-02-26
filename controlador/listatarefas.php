<?php
    
    class ListatarefasController extends conexao {
      use Controlador;
    

    public function listar(){
        return $this-> pdo ->  query("SELECT * from listatarefas;") ->fetchAll();  
       
    } 
    public function get($id){
       return $this-> pdo -> query("SELECT * from listatarefas WHERE id_listaTarefas = '$id'; ") ->fetchAll();
    }
    public function post(){

        $verifica = ['id_task','nome_lista'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("INSERT INTO listatarefas ( `id_task`, `nome_lista`) VALUES ('$_POST[id_task]', '$_POST[nome_lista]')");
            
    }
    public function put($id){
        global $_PUT;
        
        return $this -> pdo -> query("UPDATE listatarefas SET nome_lista = '$_PUT[nome_lista]' WHERE id_listaTarefas ='$id';");
    }
    public function delete($id){
        echo "Deletar: $id";

        $valor = $this -> pdo -> query("SELECT id_listaTarefas FROM listatarefas WHERE id_listaTarefas='$id'; ");
        
        if($valor){
            return $this -> pdo -> query("DELETE FROM listatarefas WHERE id_listaTarefas ='$id'; ");
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>