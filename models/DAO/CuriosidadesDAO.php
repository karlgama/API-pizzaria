<?php

/* Classe de curiosidade (DAO) para integração com database
*   Autor: karl Gama    
*   Data de criação: 10/12/19
*   Modificações:
*   Nome: 
*   Modificações:
*/
//verifica se o arquivo de conexão já foi importado
if(!file_exists(include_once('./models/DAO/ConexaoMysql.php')))
    include_once('./models/DAO/ConexaoMysql.php');

if(!file_exists(include_once('./models/Curiosidades.php')))
    include_once('./models/Curiosidades.php');


class CuriosidadesDAO
{
    private $conexaoMysql;
    private $conexao;


    public function __construct()
    {
        $this->conexaoMysql = new ConexaoMysql();
        $this->conexao = $this->conexaoMysql->connectDatabse();   
    }

    /*insere uma curiosidade */
    public function insertCuriosidade(Curiosidades $curiosidades)
    {
      /*SCRIPT para a inserção no banco */
        $sql="INSERT INTO tblcuriosidades(titulo, texto, imagem, status)
        VALUES (?,?,?,?)";

        
        $statement = $this->conexao->prepare($sql);

        $statementDados = array (
            $curiosidades->getTitulo(),
            $curiosidades->getTexto(),
            $curiosidades->getImagem(),
            $curiosidades->getStatus()
        );

        //var_dump($statementDados);
        if($statement->execute($statementDados))
            return true;
        
        $this->conexaoMysql = null;
    }
    /*localiza uma curiosidade */
    public function selectByID($id)
    {
        $sql="SELECT * FROM tblcuriosidades WHERE id=".$id;
        $select = $this->conexao->query($sql);

        //$curiosidades = array();
        // echo $sql;
        if($rsCuriosidades = $select->fetch(PDO::FETCH_ASSOC))
        {
            $curiosidades = new Curiosidades($rsCuriosidades['titulo'],$rsCuriosidades['texto'],$rsCuriosidades['imagem'],$rsCuriosidades['status'],$rsCuriosidades['id']);
            // var_dump($curiosidades) ;
            return $curiosidades;
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