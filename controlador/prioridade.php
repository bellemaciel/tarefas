<?php
    class PrioridadeController extends conexao {
        use Controlador;

    public function listar(){
        return $this-> pdo ->  query("SELECT * from prioridade;") ->fetchAll();
    } 
  
    public function get($id){
       return $this-> pdo -> query("SELECT * from prioridade WHERE id_prioridade = '$id'; ") ->fetchAll();
       
      
    }
    public function post(){

        $verifica = ['id_task', 'nivelPrioridade'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("INSERT INTO prioridade ( `id_task`, `nivelPrioridade`) VALUES ('$_POST[id_task]', '$_POST[nivelPrioridade]')");       
         
    }
    public function put($id){
        global $_PUT;
        
        return $this -> pdo -> query("UPDATE prioridade SET nivelPrioridade = '$_PUT[nivelPrioridade]' WHERE id_prioridade ='$id';");
    }
    public function delete($id){
        echo "Deletar: $id";

        $valor = $this -> pdo -> query("SELECT id_prioridade FROM prioridade WHERE id_prioridade='$id'; ");
        
        if($valor){
            return $this -> pdo -> query("DELETE FROM prioridade WHERE id_prioridade ='$id'; "); 
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>