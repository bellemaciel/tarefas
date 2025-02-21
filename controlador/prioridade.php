<?php
    class PrioridadeController extends conexao {
        use Controlador;

    public function listar(){
        $prioridade = $this-> pdo ->  query("SELECT * from prioridade;") ->fetchAll();
        echo "<br>----------------Prioridades Cadastrados:----------------<br>";
        

        $items = count($prioridade);

        
        for($num = 0; $num < $items; $num += 1){
            echo  $prioridade[$num]['id_prioridade']." | ";
            echo  $prioridade[$num]['id_task']." | ";
            echo  $prioridade[$num]['nivelPrioridade']. " | <br>";
        }
    } 
    public function get($id){
       $prioridade = $this-> pdo -> query("SELECT * from prioridade WHERE id_prioridade = '$id'; ") ->fetchAll();
       
       $items = count($prioridade);
       foreach($prioridade as $task){
        echo "<br>";
        echo  $task['id_prioridade']." | ";
        echo  $task['id_task']." | ";
        echo  $task['nivelPrioridade']. " | <br>";
       }
    }
    public function post(){
        echo "Cadastrar";

        $verifica = ['nivelPrioridade'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        $valor = $this -> pdo -> query("INSERT INTO prioridade ( `nivelPrioridade`) VALUES ('$_POST[nivelPrioridade]')");

        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
        
         
    }
    public function put($id){
        global $_PUT;
        
        echo "Atualizar: $id";
       
        $valor = $this -> pdo -> query("UPDATE prioridade SET nivelPrioridade = '$_PUT[nivelPrioridade]' WHERE id_prioridade ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";

        $valor = $this -> pdo -> query("SELECT id_prioridade FROM prioridade WHERE id_prioridade='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM prioridade WHERE id_prioridade ='$id'; ");
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