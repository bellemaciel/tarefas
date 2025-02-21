<?php
    class TarefaController extends conexao {
        use Controlador;
          
        public function listar(){
        return $this-> pdo ->  query("SELECT * from tarefa;") ->fetchAll();
        echo "<br>----------------Tarefas Cadastradas:----------------<br>";
        //var_dump($tarefa);

        $items = count($tarefa);

        // Loop through array
        for($num = 0; $num < $items; $num += 1){
            echo  $tarefa[$num]['id_task']." | ";
            echo  $tarefa[$num]['nome_task']." | ";
            echo  $tarefa[$num]['descricao']." | ";
            echo  $tarefa[$num]['data_inicio']." | ";
            echo  $tarefa[$num]['data_fim']." | ";
            echo  $tarefa[$num]['dataFimEstimada']. " | <br>";
        }

        
    } 
    public function get($id){
       $tarefa = $this-> pdo -> query("SELECT * from tarefa WHERE id_task = '$id'; ") ->fetchAll();
       //var_dump($valor);
       $items = count($tarefa);
       foreach($tarefa as $task){
        echo "<br>";
        echo  $task['id_task']." | ";
        echo  $task['nome_task']." | ";
        echo  $task['descricao']." | ";
        echo  $task['data_inicio']." | ";
        echo  $task['data_fim']." | ";
        echo  $task['dataFimEstimada']. " | <br>";
       }
    }
    public function post(){
        echo "Cadastrar";
        $verifica = ['nome_task', 'descricao', 'data_inicio', 'data_fim', 'dataFimEstimada'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
    
        $valor = $this -> pdo -> query("INSERT INTO tarefa (`nome_task`, `descricao`, `data_inicio`, `data_fim`, `dataFimEstimada`) VALUES ('$_POST[nome_task]','$_POST[descricao]','$_POST[data_inicio]','$_POST[data_fim]','$_POST[dataFimEstimada]')");

        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
      
         //testar com postman
    }
    public function put($id){
        global $_PUT;
        #var_dump($_PUT);
        echo "Atualizar: $id";
        
        $verifica = ['nome_task', 'descricao', 'data_inicio', 'data_fim', 'dataFimEstimada'];

        foreach ($verifica as $campo) {
            if (!isset($_PUT[$campo]) || empty($_PUT[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        #$valor = $this -> pdo -> query("INSERT INTO tarefa(`nome_task`, `descricao`, `data_inicio`, `data_fim`, `dataFimEstimada`) VALUES ('$_PUT[nome_task]','$_PUT[descricao]','$_PUT[data_inicio]','$_PUT[data_fim]','$_PUT[dataFimEstimada]') WHERE id_task ='$id';");
        $valor = $this -> pdo -> query("UPDATE tarefa SET nome_task = '$_PUT[nome_task]', descricao = '$_PUT[descricao]', data_inicio = '$_PUT[data_inicio]', data_fim = '$_PUT[data_fim]', dataFimEstimada = '$_PUT[dataFimEstimada]'  WHERE id_task ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";
        
        $valor = $this -> pdo -> query("SELECT id_task FROM tarefa WHERE id_task='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM tarefa WHERE id_task ='$id'; ");
            if($valor){
                echo "<br> Sucesso! ID: $id deletado.";
            }else{
                echo "<br> Erro!";
            }
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>