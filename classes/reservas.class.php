<?php

class Reservas
{
    private $pdo;
    private $pessoa;
    private $data_inicio;
    private $data_fim;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return mixed
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param mixed $pessoa
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    }

    /**
     * @return mixed
     */
    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    /**
     * @param mixed $data_inicio
     */
    public function setDataInicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;
    }

    /**
     * @return mixed
     */
    public function getDataFim()
    {
        return $this->data_fim;
    }

    /**
     * @param mixed $data_fim
     */
    public function setDataFim($data_fim)
    {
        $this->data_fim = $data_fim;
    }


    public function getReserva($data_inicio,$data_fim)
    {
        $lista = array();

        $sql = "SELECT * FROM reservas where( NOT (data_inicio > :data_fim OR data_fim < :data_inicio) )";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $lista = $sql->fetchAll();
        }

        return $lista;

    }


    public function verificarDisponibilidade($carro, $data_inicio, $data_fim)
    {
        $sql = "SELECT * FROM reservas WHERE id_carro = :carro AND (NOT (data_inicio > :data_fim OR data_fim < :data_inicio) )";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":carro", $carro);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function reservar($carro,$data_inicio,$data_fim,$pessoa)
    {
        $sql = "INSERT INTO reservas(id_carro,data_inicio,data_fim,pessoa) VALUES (:carro,:data_inicio,:data_fim,:pessoa) ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":carro", $carro);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->bindValue(":pessoa", $pessoa);
        $sql->execute();
    }
}
