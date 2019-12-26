<?php
/* Classe de Curiosidades (Controller)
*   Autor: Karl Gama    
*   Data de criação: 10/11/19
*   Modificações:
*   Nome: 
*   Modificações:
*/

    if (!file_exists(include_once('./models/Curiosidades.php'))) 
        include_once('./models/Curiosidades.php');
    
    if (!file_exists(include_once('./models/DAO/CuriosidadesDAO.php'))) 
        include_once('./models/DAO/CuriosidadesDAO.php');

    class CuriosidadesController
    {
        private $curiosidadesDAO;
        private $curiosidades;
        

        //construtor
        public function __construct()
        {
            $this->curiosidadesDAO = new CuriosidadesDAO();
            
        }
        //lista todas as curiosidades
        public function listarCuriosidade()
        {
            return $this->curiosidadesDAO->selectAll();   
        }
        //busca curiosidade pelo id
        public function buscarCuriosidade($id)
        {
            return $this->curiosidadesDAO->selectByID($id);
        }
        //insere nova curiosidade
        public function novaCuriosidade()
        {
            require_once('./controllers/foto.php');
            $valida = new Foto();
            $img = $valida->validaFoto();
            $status = $_POST['status'] =='1'? $status = 1: $status = 0;
            $titulo = $_POST['txttitulo'];
            $texto = $_POST['txtconteudo'];
            $this->curiosidades = new Curiosidades($titulo, $texto, $img, $status);
            
            //var_dump($curiosidade);
            if($this->curiosidadesDAO->insertCuriosidade($this->curiosidades))
                echo('ok');
            else
            {
                var_dump($this->curiosidades);
                echo('<br>erro');
                
            }
                
        }

    }
?>