<?php
    class EstadoController extends conexao {
        use Controlador;

    public function listar(){
        $estado = $this-> pdo ->  query("SELECT * from estado;") ->fetchAll();
        echo "<br>----------------Estados Cadastrados:----------------<br>";
        

        $items = count($estado);

        
        for($num = 0; $num < $items; $num += 1){
            echo  $estado[$num]['id_estado']." | ";
            echo  $estado[$num]['id_task']." | ";
            echo  $estado[$num]['tipo_estado']. " | <br>";
        }
    } 
    public function get($id){
       $estado = $this-> pdo -> query("SELECT * from estado WHERE id_estado = '$id'; ") ->fetchAll();
        echo "<br>";
        echo  $estado['id_estado'];
       
      $items = count($estado);
       foreach($estado as $task){
        echo "<br>";
        echo  $task['id_estado']." | ";
        echo  $task['id_task']." | ";
        echo  $task['tipo_estado']. " | <br>";
       }
    }
    public function post(){
        echo "Cadastrar";

        $verifica = ['id_task', 'tipo_estado'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        $valor = $this -> pdo -> query("INSERT INTO estado ( `id_task`, `tipo_estado`) VALUES ('$_POST[id_task]','$_POST[tipo_estado]')");

        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
        
         
    }
    public function put($id){
        global $_PUT;
        
        echo "Atualizar: $id";
       
        $valor = $this -> pdo -> query("UPDATE estado SET tipo_estado = '$_PUT[tipo_estado]', id_task = '$_PUT[id_task]  WHERE id_estado ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";

        $valor = $this -> pdo -> query("SELECT id_estado FROM estado WHERE id_estado='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM estado WHERE id_estado ='$id'; ");
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