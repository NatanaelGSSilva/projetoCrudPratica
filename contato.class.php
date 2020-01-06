<?php
class Contato { 

    private $pdo;

    
    function __construct(){
    
        // fazendo a conexao com o banco de dados
        $this->pdo = new PDO('mysql:dbname=crudoo;host=localhost', 'root', '');
    }
    
    
    // inserindo contatos
    public function adicionar($email,$nome = ""){
        // 1 passo verificar se o email ja existe no sistema
        // 2 passo = adicionar
        if($this->existeEmail($email) == false){
            $sql= "INSERT into contatos (nome, email) values (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;

        }else{
            return false;
        }
    }


    public function getInfo($id){
        $sql = "SELECT * from contatos where id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();


        if($sql->rowCount() > 0) {
            
            return $sql->fetch(); //retorna somente o email

        }else{
            return array(); // retornando um array sem nenhum dado
        }

    }

    public function getAll(){
        $sql = "SELECT * from contatos";
        $sql = $this->pdo->query($sql);


        if($sql->rowCount() > 0) {
            
            return $sql->fetchAll(); // returna toda a galera um array preenchido com os contatos

        }else{
            return array(); // retornando um array sem nenhum dado
        }

    }

    // criando a atualizacao
    public function editar($nome,$email,$id){
        if($this->existeEmail($email) == false){ // se nao existir esse email a gente altera
        $sql ="UPDATE contatos set nome = :nome, email=:email where id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome); // ele manda o nome
        $sql->bindValue(':email', $email); // ele manda o nome
        $sql->bindValue(':id', $id); // ele manda o id
        $sql->execute();

        return true;
        }else{
            return false; // quer dizer que o email nao foi alterado
        }
    }
/*
    public function excluirpeloEmail($email){
        if($this->existeEmail($email)){
            $sql= "delete from contatos where email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }
    */
    public function excluir($id){
        
            $sql= "DELETE from contatos where id =:id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

         
    }


    private function existeEmail($email){
      $sql= "SELECT * from contatos where email = :email";
      $sql= $this->pdo->prepare($sql);
      $sql->bindValue(':email',$email);
      $sql->execute();

      
      if($sql->rowCount() > 0) {
          return true;

      }else{
          return false;
      }

}

}