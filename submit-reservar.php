<?php
require 'config.php';
require 'classes/reservas.class.php';
require 'classes/carros.class.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);

if (!empty($_POST['carros'])) {
    $carroC = $carros->setCarro(addslashes($_POST['carros']));
   // $data_inicioinput = explode("/", $reservas->setDataInicio($_POST['data_inicio']));
    //$data_fiminput = explode("/", $reservas->setDataFim($_POST['data_fim']));
    $reservas->setPessoa(addslashes($_POST['pessoa']));

//    $data_inicio = $data_inicioinput[2] . '-' . $data_inicioinput[1] . '-' . $data_inicioinput[0];
//    $data_fim = $data_fiminput[2] . '-' . $data_fiminput[1] . '-' . $data_fiminput[0];
    $data_inicio = $reservas->setDataInicio($_POST['data_inicio']);
    $data_fim = $reservas->setDataFim($_POST['data_fim']);
    $carro = $carros->getCarro();
    $data_inicio = $reservas->getDataInicio();
    $data_fim = $reservas->getDataFim();
    $pessoa = $reservas->getPessoa();

    echo $pessoa."</br>";
    echo $carro."</br>";
    //var_dump($data_inicio);
//    echo $_POST['data_inicio']."</br>";
//    echo $_POST['data_fim']."</br>";

    echo $data_inicio."</br>";
    echo $data_fim."</br>";

    if ($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
        $reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
        header("Location: index.php");
        exit;
    } else {
        echo 'Esse carro esta Alugado';
    }
}


