<?php
    class EtiquetaController extends conexao {
        use Controlador;

    public function listar(){
        $etiqueta = $this-> pdo ->  query("SELECT * from etiqueta;") ->fetchAll();
        echo "<br>----------------Etiquetas Cadastradas:----------------<br>";
        //var_dump($etiqueta);

        $items = count($etiqueta);

        // Loop through array
        for($num = 0; $num < $items; $num += 1){
            echo  $etiqueta[$num]['id_etiqueta']." | ";
            echo  $etiqueta[$num]['id_task']." | ";
            echo  $etiqueta[$num]['cor']." | ";
            echo  $etiqueta[$num]['nome_etiqueta']." | <br> ";
            
        }
    } 
    public function get($id){
       $etiqueta = $this-> pdo -> query("SELECT * from etiqueta WHERE id_etiqueta = '$id'; ") ->fetchAll();
       //var_dump($valor);
       $items = count($etiqueta);
       foreach($etiqueta as $task){
        echo "<br>";
        echo  $task['id_etiqueta']." | ";
        echo  $task['id_task']." | ";
        echo  $task['cor']." | ";
        echo  $task['nome_etiqueta']." | <br> ";
       }
    }
    public function post(){
        echo "Cadastrar";
        $verifica = ['cor', 'nome_etiqueta'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
    
        $valor = $this -> pdo -> query("INSERT INTO etiqueta (`cor`, `nome_etiqueta`) VALUES ('$_POST[cor]','$_POST[nome_etiqueta]')");

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
        
        $verifica = ['cor', 'nome_etiqueta'];

        foreach ($verifica as $campo) {
            if (!isset($_PUT[$campo]) || empty($_PUT[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        $valor = $this -> pdo -> query("UPDATE etiqueta SET cor = '$_PUT[cor]', nome_etiqueta = '$_PUT[nome_etiqueta]'  WHERE id_etiqueta ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";
        
        $valor = $this -> pdo -> query("SELECT id_etiqueta FROM etiqueta WHERE id_etiqueta='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM etiqueta WHERE id_etiqueta ='$id'; ");
            if($valor){
                echo "<br> Sucesso! ID: $id deletado.";
            }else{
                echo "<br> Erro!";
            }
        }else{
            echo "<br> Erro: etiqueta com ID $id não encontrada.";
        }
       
    }
}
?>