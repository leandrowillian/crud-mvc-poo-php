<?php
    
    // Requerindo a model ao controller
    require_once('./models/Client.php');


    class clientsController
    {
        // Criando um atributo privado para utilizarmos a model do client
        private $model;

        function __construct()
        {
            $this->model = new ClientModel;
        }

        // Função SELECT * FROM
        function getAll()
        {
            $results = $this->model->selectAll();
            require_once("./views/index.php");
        }
        
        // Função SELECT... WHERE ID
        function get($id)
        {
            $results = $this->model->selectById($id);
            echo json_encode($results);

        }


    }
