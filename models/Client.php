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




    }