<?php
    class UsuarioController extends conexao {
       use Controlador;
    

    public function listar(){
        return $this-> pdo ->  query("SELECT * from usuario;") ->fetchAll();       
    } 
    public function get($id){
       return $this-> pdo -> query("SELECT * from usuario WHERE id_user = '$id'; ") ->fetchAll();  
    }
    public function post(){
        
        $verifica = ['nome_user'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("INSERT INTO usuario (`nome_user`) VALUES ('$_POST[nome_user]')");     
    }
    public function put($id){
        global $_PUT;
        
        $verifica = ['nome_user'];

        foreach ($verifica as $campo) {
            if (!isset($_PUT[$campo]) || empty($_PUT[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        return $this -> pdo -> query("UPDATE usuario SET nome_user = '$_PUT[nome_user]'  WHERE id_user ='$id';");    
    }
    public function delete($id){
        
        $valor = $this -> pdo -> query("SELECT id_user FROM usuario WHERE id_user='$id'; ");
        
        if($valor){
            return $this -> pdo -> query("DELETE FROM usuario WHERE id_user ='$id'; ");
        }else{
            echo "<br> Erro: usuario com ID $id não encontrada.";
        }
       
    }
}
?>