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
            require_once("./views/index.php");

        }

        // Função DELETE FROM... WEHERE ID
        function delete($id = "")
        {
            if ($id == "" || $id == null){
                echo "Informe um id";
                exit;
            }else{
                $response = $this->model->deleteById($id);
                echo $response;
                
            }
        }

        // Função de update
        function update($id = "")
        {   
            
            if ($id == "" || $id == null){
                echo "Informe um id";
                exit;
            }else{

                $dataUser = $this->model->selectById($id)[0];
                $params = $_POST;
                
                foreach($params as $key => $value){
                    $params[$key] == "" ? $params[$key] = $dataUser[$key] : $params[$key] = $value;
                }
               
                
                $results = $this->model->updateUser($id, $params);
                require_once("./views/index.php");
            }
        }

        

    }
