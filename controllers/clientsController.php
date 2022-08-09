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
    }
