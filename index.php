<!-- Roteamento e gerenciamento -->
<!-- 
    index -> controller
    controller -> models
    models -> consulta db -> controller
    controller -> views
-->
<?php

    // Incluindo o controller à index
    require_once('./controllers/clientsController.php');

    // Recebendo ação via get para chamarmos a funcção correta
        // If ternário. Se houver alguma ação, vamos pegar ela, caso contrário, chamaremos a função de lsitar todos
    $action = !empty($_GET['action']) ? $_GET['action'] : 'getAll';
    $paramId = !empty($_GET['id']) ? $_GET['id'] : null;

    // Instanciando o controller de client
    $controller = new clientsController();

    if($paramId){
    // Chamando a ação que está guardada na varialvel $action. Caso exista parametro, chamar a função passando o parametro
        $controller->{$action}($paramId);
    }else{  
    // Chamando a ação que está guardada na varialvel $action. Necessita-se de estar entre chaves para que seja feita essa chamada dinamicamente
        $controller->{$action}();
    }
  


?>