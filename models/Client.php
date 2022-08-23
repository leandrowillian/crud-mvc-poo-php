<!-- Consultas/Regras de negócio -->
<?php

    require_once('./configuration/connect.php');

    // Classe extendida da connect pois essa classe que fará as alterações no nosso DB
    class ClientModel extends Connect
    {
        // Criando atributo privado para gaurdar a tabela queiremos realizar as consultas/alterações
        private $table;

        function __construct()
        {
            // Chamando a função construtora da classe pai (Connect)
            parent::__construct();
            // Definindo o valor do atributo privado table
            $this->table = 'clients';
        }

        function selectAll()
        {
            $sql = $this->conn->query("SELECT * FROM $this->table");
            $resultQuery = $sql->fetchAll();
            return $resultQuery; 
        }

        function selectById($id)
        {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $resultQuery = $stmt->fetchAll($this->conn::FETCH_ASSOC);

            return $resultQuery;
        }

        function deleteById($id)
        {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount()){
                return "Excluído com sucesso!!";
            }else{
                return "Não foi possível excluir!";
                exit;
            }

        }

        function updateUser($id, $params)
        {
            
            $sql = "UPDATE $this->table SET name = :n, email = :e, phone = :p WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":n", $params['name']);
            $stmt->bindParam(":e", $params['email']);
            $stmt->bindParam(":p", $params['phone']);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount()){
                return $this->selectById($id);
            }else{
                echo "Erro ao atualizar usuário";
                exit;
            }

        }


        function insertUser($data)
        {
            $sql = "INSERT INTO $this->table (name, email, phone) VALUES (:n,:e,:p)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":n", $data['name']);
            $stmt->bindParam(":e", $data['email']);
            $stmt->bindParam(":p", $data['phone']);
            $stmt->execute();
            if($stmt->rowCount()){
                return $this->selectAll();
            }else{
                echo "Erro ao inserir usuário";
                exit;
            }
        }




    }