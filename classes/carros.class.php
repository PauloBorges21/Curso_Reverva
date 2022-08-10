<?php
class Carros
{
    private $carro;

    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public  function getCarro(){
        return $this->carro;
    }

    public function setCarro($carro){
        $this->carro = $carro;
    }

    public function getCarros()
    {
        $array = array();
        $sql =  "SELECT * from tb_carros";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0 )
        {
           $array = $sql->fetchAll();
        }
        return $array;

    }

}