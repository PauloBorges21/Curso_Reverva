<?php
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';
$reservas = new Reservas($pdo);
$carros = new Carros($pdo);


?>

<h1>Adicionar Reserva</h1>

<form method="post" action="submit-reservar.php">
    <label>Carros</label></br>
<select name="carros">
    <option selected disabled>Escolha um carro</option>
<?php
$listagemCarros = $carros->getCarros();
foreach ( $listagemCarros as  $itens): ?>
<option value="<?= $itens->id; ?>" ><?= $itens->nome; ?></option>
<?php endforeach;?>
</select>

    </br></br>
    <label>Período</label></br></br>
    <label>Data de início</label>
    <input type="date" name="data_inicio"></br></br>
    <label>Data fim</label>
    <input type="date" name="data_fim"></br></br>
<label>Nome da Pessoa</label>
<input type="text" name="pessoa"></br></br>
<input type="submit" value="Reservar">

</form>