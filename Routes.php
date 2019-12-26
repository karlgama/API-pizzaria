<?php
/* Classe de rotas 
*   Autor: karl Gama    
*   Data de criação: 15/12/19
*   Modificações:
*   Nome: 
*   Modificações:
*/
    $controller = $_GET['controller'];
    $modo =$_SERVER['REQUEST_METHOD'];
    
    //verifica o que será manipulados, para decidir a rota
    switch(strtolower($controller))
    {
        //verifica se a rota é curiosidades
        case 'curiosidades':
            require_once('./controllers/CuriosidadesController.php');
            $curiosidadesController = new CuriosidadesController();
            
            switch(strtoupper($modo))
            {
                case 'GET':
                    if(isset($_GET['id']))
                    {
                        $res = json_encode($curiosidadesController->buscarCuriosidade($_GET['id']));
                        echo $res;
                    }
                        
                    else
                    {
                        $res = json_encode($curiosidadesController->listarCuriosidade());
                        echo $res;
                    }
                        
                    break;
                
                case 'POST':
                    $curiosidadesController->novaCuriosidade();
                    break;

            }
            // var_dump($res);
            

        }

?>