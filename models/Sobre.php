<?php
/* Classe Sobre a empresa 
*   Autor: Karl Gama    
*   Data de criação: 23/11/19
*   Modificações:
*   Nome: 
*   Modificações:
*/

class Sobre implements \JsonSerializable
{
    private $id;
    private $texto;

    /*Construtor */
    public function __construct($titulo,$texto,$img,$status, $id)
    {
        $this->texto = $texto;
        $this->id = $id;
    }

    public function jsonSerialize() {
        return array(
            'id' => $this->id,
            'texto' => $this->texto         
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
        return $this->text;
    }
    
    public function setTexto($texto)
    {
        $this->id=$texto;
    }

}

?>