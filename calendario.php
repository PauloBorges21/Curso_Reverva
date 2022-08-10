<?php

//echo "Primeiro dia: ".$dia1. "</br>" ;
//echo "Total dias: ".$dias. "</br>" ;
//echo "Total de Linhas ".$linhas."<br>";
//echo "Data INICIO: " .$data_inicio."</br>";
//echo "Data FIM: " .$data_fim."</br></br></br>";
?>

<table border="1" width="100%">
    <tr>
        <th>DOM</th>
        <th>SEG</th>
        <th>TER</th>
        <th>QUA</th>
        <th>QUI</th>
        <th>SEX</th>
        <th>SAB</th>
    </tr>
    <?php for ($l = 0; $l < $linhas; $l++): ?>
        <tr>
            <?php
            for ($diasemana = 0; $diasemana < 7; $diasemana++):
                $dia = date('Y-m-d', strtotime(($diasemana + ($l * 7)) . 'days', strtotime($data_inicio)));
                ?>

                <td><?php
                    echo $dia . "</br></br>";
                    $dia = strtotime($dia);
                    foreach ($lista as $itens) {
                        $dr_inicio = strtotime($itens->data_inicio);
                        $dr_fim = strtotime($itens->data_fim);

                        if($dia >= $dr_inicio && $dia <= $dr_fim ){
                            echo $itens->pessoa . '</br>';
                        }
                    } ?>
                   </td>
            <?php endfor; ?>
        </tr>

    <?php endfor; ?>

</table>
