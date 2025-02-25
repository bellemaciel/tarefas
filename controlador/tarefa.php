<?php
    class TarefaController extends conexao {
        use Controlador;
          
        public function listar(){
        return $this-> pdo ->  query("SELECT * from tarefa;") ->fetchAll();
       
    } 
    public function get($id){
       return $this-> pdo -> query("SELECT * from tarefa WHERE id_task = '$id'; ") ->fetchAll();
     
    }
    public function post(){
        
        $verifica = ['nome_task', 'descricao', 'data_inicio', 'data_fim', 'dataFimEstimada'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
    
       return $this -> pdo -> query("INSERT INTO tarefa (`nome_task`, `descricao`, `data_inicio`, `data_fim`, `dataFimEstimada`) VALUES ('$_POST[nome_task]','$_POST[descricao]','$_POST[data_inicio]','$_POST[data_fim]','$_POST[dataFimEstimada]')");

    }
    public function put($id){
        global $_PUT;
        
        $verifica = ['nome_task', 'descricao', 'data_inicio', 'data_fim', 'dataFimEstimada'];

        foreach ($verifica as $campo) {
            if (!isset($_PUT[$campo]) || empty($_PUT[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        
        return $this -> pdo -> query("UPDATE tarefa SET nome_task = '$_PUT[nome_task]', descricao = '$_PUT[descricao]', data_inicio = '$_PUT[data_inicio]', data_fim = '$_PUT[data_fim]', dataFimEstimada = '$_PUT[dataFimEstimada]'  WHERE id_task ='$id';");
        
    }
    public function delete($id){
        
        $valor = $this -> pdo -> query("SELECT id_task FROM tarefa WHERE id_task='$id'; ");
        
        if($valor){
            return $this -> pdo -> query("DELETE FROM tarefa WHERE id_task ='$id'; ");
           
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>