<?php
    class UsuarioController extends conexao {
       use Controlador;
    

    public function listar(){
        $usuario = $this-> pdo ->  query("SELECT * from usuario;") ->fetchAll();
        echo "<br>----------------Usuarios Cadastradas:----------------<br>";
        //var_dump($usuario);

        $items = count($usuario);

        // Loop through array
        for($num = 0; $num < $items; $num += 1){
            echo  $usuario[$num]['id_user']." | ";
            echo  $usuario[$num]['nome_user']." | <br> ";
            
        }
    } 
    public function get($id){
       $usuario = $this-> pdo -> query("SELECT * from usuario WHERE id_user = '$id'; ") ->fetchAll();
       //var_dump($valor);
       $items = count($usuario);
       foreach($usuario as $task){
        echo "<br>";
        echo  $task['id_user']." | ";
        echo  $task['nome_user']." |<br> ";
       }
    }
    public function post(){
        echo "Cadastrar";
        $verifica = ['nome_user'];

        foreach ($verifica as $campo) {
            if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
    
        $valor = $this -> pdo -> query("INSERT INTO usuario (`nome_user`) VALUES ('$_POST[nome_user]')");

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
        
        $verifica = ['nome_user'];

        foreach ($verifica as $campo) {
            if (!isset($_PUT[$campo]) || empty($_PUT[$campo])) {
                echo "<br>Erro: O campo '$campo' é obrigatório e não pode estar vazio.";
                return;
            }
        }
        $valor = $this -> pdo -> query("UPDATE usuario SET nome_user = '$_PUT[nome_user]'  WHERE id_user ='$id';");
        if($valor){
            echo "<br> Sucesso";
        }else{
            echo "<br> Erro";
        }
    }
    public function delete($id){
        echo "Deletar: $id";
        
        $valor = $this -> pdo -> query("SELECT id_user FROM usuario WHERE id_user='$id'; ");
        
        if($valor){
            $valor = $this -> pdo -> query("DELETE FROM usuario WHERE id_user ='$id'; ");
            if($valor){
                echo "<br> Sucesso! ID: $id deletado.";
            }else{
                echo "<br> Erro!";
            }
        }else{
            echo "<br> Erro: usuario com ID $id não encontrada.";
        }
       
    }
}
?>