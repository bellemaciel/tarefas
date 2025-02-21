<?php
    
    class ListatarefasController extends conexao {
      use Controlador;
    

    public function listar(){
        $listatarefas = $this-> pdo ->  query("SELECT * from listatarefas;") ->fetchAll();

        //$json = json_encode($listatarefas);

        //$listatarefas = json_decode($json);


        echo "<br>----------------Lista de Tarefas Cadastradas:----------------<br>";
        

        $items = count($listatarefas);
/*
        foreach ($listatarefas as $item)
        {
            foreach ($item as $col)
                echo $col;
        }
                */
        for($num = 0; $num < $items; $num += 1){
            echo  $listatarefas[$num]['id_listaTarefas']." | ";
            echo  $listatarefas[$num]['id_task']." | ";
            echo  $listatarefas[$num]['nome_lista']. " | <br>";
        }
    } 
    public function get($id){
       $listatarefas = $this-> pdo -> query("SELECT * from listatarefas WHERE id_listaTarefas = '$id'; ") ->fetchAll();
       
       $items = count($listatarefas);
       foreach($listatarefas as $task){
        echo "<br>";
        echo  $task['id_listaTarefas']." | ";
        echo  $task['id_task']." | ";
        echo  $task['nome_lista']. " | <br>";
       }
    }
    public function post(){
        echo "Cadastrar";

        $verifica = ['id_task','nome_lista'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        $valor = $this -> pdo -> query("INSERT INTO listatarefas ( `id_task`, `nome_lista`) VALUES ('$_POST[id_task]', '$_POST[nome_lista]')");

        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
        
         
    }
    public function put($id){
        global $_PUT;
        
        echo "Atualizar: $id";

        $str = '';
/*
        foreach ($_PUT as $key -> $valor)
        {
            $str .= " $key = '$valor',";
        }
       */
        $valor = $this -> pdo -> query("UPDATE listatarefas SET nome_lista = '$_PUT[nome_lista]' WHERE id_listaTarefas ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";

        $valor = $this -> pdo -> query("SELECT id_listaTarefas FROM listatarefas WHERE id_listaTarefas='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM listatarefas WHERE id_listaTarefas ='$id'; ");
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