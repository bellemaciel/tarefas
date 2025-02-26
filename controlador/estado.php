<?php
    class EstadoController extends conexao {
        use Controlador;

    public function listar(){
        return $this-> pdo ->  query("SELECT * from estado;") ->fetchAll();
       
    } 
    public function get($id){
       return $this-> pdo -> query("SELECT * from estado WHERE id_estado = '$id'; ") ->fetchAll();
       
    }
    public function post(){

        $verifica = ['id_task', 'tipo_estado'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("INSERT INTO estado ( `id_task`, `tipo_estado`) VALUES ('$_POST[id_task]','$_POST[tipo_estado]')");
     
    }
    public function put($id){
        global $_PUT;
        return $this -> pdo -> query("UPDATE estado SET tipo_estado = '$_PUT[tipo_estado]', id_task = '$_PUT[id_task]'  WHERE id_estado ='$id';");
    }
    
    public function delete($id){
        $valor = $this -> pdo -> query("SELECT id_estado FROM estado WHERE id_estado='$id'; ");
        
        if($valor){
           return $this -> pdo -> query("DELETE FROM estado WHERE id_estado ='$id'; "); 
        }else{
            echo "<br> Erro: Tarefa com ID $id não encontrada.";
        }
       
    }
}
?>