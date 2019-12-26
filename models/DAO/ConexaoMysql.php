<?php
/* Classe para conexão com Mysql
*   Autor: karl Gama    
*   Data de criação: 10/12/19
*   Modificações:
*   Nome: 
*   Modificações:
*/


class ConexaoMysql
{
    private $host;
    private $user;
    private $password;
    private $database;


    //construtor
    public function __construct()
    {
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->password = "bcd127";
        $this->database = "db_pizzaria";
    }

    /*Abre a conexão com o banco */
    public function connectDatabse()
    {
        try
        {
            /*instância a classe PDO */

            $conexao = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->password);
            return $conexao;
        }
        catch(PDOException $err)
        {
            echo("Falha na conexão com o banco de dados.
                <br>Linha do erro:" . $err->getLine() . "
                <br>Mensagem do erro:" . $err->getMessage());
                die();
        }
    }
}


?>