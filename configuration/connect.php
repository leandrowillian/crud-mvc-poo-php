<!-- Conexão com o banco de dados -->
<?php

    // Definindo as constantes

    define('HOST', 'localhost');
    define('DB', 'crud-mvc-poo');
    define('USER', 'root');
    define('PASSWORD', '');


    // Criando classe de conexão com o DB
    class Connect
    {
        // Criando atributo protegido para apenas essa classe ou uma que estender ela acessar
        protected $conn;

        // método mágico construtor
        function __construct()
        {
            $this->connectDb();
        }

        function connectDb()
        {
            // Utilizando try catch para tratar erros
            try
            {
                $this->conn = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD);
            }
            catch (PDOException $e)
            {
                echo "Error!! ". $e->getMessage();
                die();
            }
        }
    }