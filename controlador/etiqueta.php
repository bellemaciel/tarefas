<?php
    class EtiquetaController extends conexao {
        use Controlador;

    public function listar(){
       return $this-> pdo ->  query("SELECT * from etiqueta;") ->fetchAll();
    } 
    public function get($id){
       return $this-> pdo -> query("SELECT * from etiqueta WHERE id_etiqueta = '$id'; ") ->fetchAll();
       
      
    }
    public function post(){
       
        $verifica = ['id_task' ,'cor', 'nome_etiqueta'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
    
        return $this -> pdo -> query("INSERT INTO etiqueta (`id_task`, `cor`, `nome_etiqueta`) VALUES ('$_POST[id_task]', '$_POST[cor]','$_POST[nome_etiqueta]')");
    }
    public function put($id){
        global $_PUT;
        
        $verifica = ['cor', 'nome_etiqueta'];

        foreach ($verifica as $campo) {
            if (!isset($_PUT[$campo]) || empty($_PUT[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("UPDATE etiqueta SET cor = '$_PUT[cor]', nome_etiqueta = '$_PUT[nome_etiqueta]'  WHERE id_etiqueta ='$id';");
    }
    public function delete($id){
        echo "Deletar: $id";
        
        $valor = $this -> pdo -> query("SELECT id_etiqueta FROM etiqueta WHERE id_etiqueta='$id'; ");
        
        if($valor){
            return $this -> pdo -> query("DELETE FROM etiqueta WHERE id_etiqueta ='$id'; ");
        }else{
            echo "<br> Erro: etiqueta com ID $id não encontrada.";
        }
       
    }
}
?>