<html>
<head>
    <title></title>
</head>
<body>
<?php
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);
?>

<h1>Reserva</h1>
<a href="adicionar-reserva.php">Adicionar Reserva</a>
</hr>
</br>
</br>
<form method="get">
    <select name="ano">
<!--  Menor para o Maior   --><?php //for ($q = 2000; $q <= date('Y'); $q++): ?>
        <?php for ($q = date('Y'); $q >= 2019; $q--): ?>
        <option><?php echo $q;?></option>
        <?php endfor; ?>
    </select>
    <select name="mes">
        <!--  Menor para o Maior   --><?php //for ($q = 2000; $q <= date('Y'); $q++): ?>
        <?php for ($m=1;$m <=12;$m++): ?>
            <option><?php echo $m;?></option>
        <?php endfor; ?>
    </select>
    <input type="submit" value="Mostrar">
</form>
<?php
if(empty($_GET['ano'])){
    exit;
}
$data = $_GET['ano'].'-'.$_GET['mes'];
$dia1 = date('w',strtotime($data));
$dias = date('t',strtotime($data));
$linhas = ceil(($dia1 + $dias) / 7);
$dia1 = -$dia1;
$data_inicio = date("Y-m-d", strtotime($dia1.' days', strtotime($data)));
$data_fim = date("Y-m-d", strtotime(( ($dia1 +($linhas*7) -1) ).' days', strtotime($data)));

$lista = $reservas->getReserva($data_inicio,$data_fim);

//foreach ($lista as $itens) :
//    $datainicio = date('d/m/Y', strtotime($itens->data_inicio));
//    $datafim = date('d/m/Y', strtotime($itens->data_fim));
//    echo $itens->pessoa . ' reservou o carro ' . $itens->id_carro . ' entre ' . $datainicio . ' à ' . $datafim . '</br>';
//
//endforeach;

?>

<?php include 'calendario.php' ?>
</body>
</html>
