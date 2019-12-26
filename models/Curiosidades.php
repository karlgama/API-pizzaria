<?php
/* Classe de Curiosidades 
*   Autor: Karl Gama    
*   Data de criação: 10/11/19
*   Modificações:
*   Nome: 
*   Modificações:
*/

class Curiosidades implements \JsonSerializable
{
    private $id;
    private $titulo;
    private $texto;
    private $img;
    private $status;

    /*Construtor */
    public function __construct($titulo, $texto, $img, $status, $id ="")
    {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->img = $img;
        $this->status = $status;
        $this->id = $id;

    }

    public function jsonSerialize() {
        return array(
            'titulo' => $this->titulo,
            'texto' => $this->texto,
            'img' => $this->img,
            'status' => $this->status,
            'id' => $this->id
        );
    }
    /* Getters & Setters*/
    
    public function getID()
    {
        return $this->id;
    }
    
    public function setID($id)
    {
        $this->id=$id;
    }
    
    public function getTexto()
    {
        return $this->texto;
    }
    
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getImagem()
    {
        return $this->img;
    }
    
    public function setImagem($img)
    {
        $this->img = $img;
    }

    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
    



}



?>