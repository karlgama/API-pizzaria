<?php

/* Classe sobre a empresa (DAO) para integração com database
*   Autor: karl Gama    
*   Data de criação: 23/12/19
*   Modificações:
*   Nome: 
*   Modificações:
*/
//verifica se o arquivo de conexão já foi importado
if(!file_exists(include_once('./models/DAO/ConexaoMysql.php')))
    include_once('./models/DAO/ConexaoMysql.php');

if(!file_exists(include_once('./models/Sobre.php')))
    include_once('./models/Sobre.php');


class SobreDAO
{
    private $conexaoMysql;
    private $conexao;


    public function __construct()
    {
        $this->conexaoMysql = new ConexaoMysql();
        $this->conexao = $this->conexaoMysql->connectDatabse();   
    }

    /*insere uma descrição sobre a empresa */
    public function insertSobre(Sobre $sobre)
    {
      /*SCRIPT para a inserção no banco */
        $sql="INSERT INTO tblempresa(texto)
        VALUES (?)";

        $statement = $this->conexao->prepare($sql);

        $statementDados = array (
            $curiosidades->getTexto()
        );

        return $statement->execute($statementDados);
        $this->conexaoMysql = null;
    }
    /*localiza uma curiosidade */
    public function selectByID($id)
    {
        $sql="SELECT * FROM tblcuriosidades WHERE id=".$id;
        $select = $this->conexao->query($sql);

        $curiosidades = array();

        if($rsCuriosidades = $select->fetch(PDO::FETCH_ASSOC))
        {
            $curiosidades = new Curiosidade($rsCuriosidades['titulo'],$rsCuriosidades['texto'],$rsCuriosidades['imagem'],$rsCuriosidades['status'],$rsCuriosidades['id']);
        }
    }

    /*retorna todas as curiosidades */
    public function selectAll()
    {
        $sql="SELECT * FROM tblcuriosidades";
        $select = $this->conexao->query($sql);

        $curiosidades = array();
        
        while($rsCuriosidades = $select->fetch(PDO::FETCH_ASSOC))
        {
            $curiosidades[] = new Curiosidades($rsCuriosidades['titulo'],$rsCuriosidades['texto'],$rsCuriosidades['imagem'],$rsCuriosidades['status'],$rsCuriosidades['id']);
            
        }
        $this->conexaoMysql = null;
       
        return  $curiosidades;
    }
}

?>