<h1> Carros </h1>
<table class="table">
    <tr>
        <td>Modelo:</td>
        <td>Marca</td>
        <td>Placa</td>
        <td></td>
        <td></td>
    </tr>
    <?php

    foreach($carros as $carro_item){
    ?>
    <tr>
        <td><?=  $carro_item['modelo']  ?></td>
        <td><?=  $carr_item['marca']  ?></td>
        <td><?=  $carro_item['placa']  ?></td>
        <td> <a href="excluir/<?=$carro_item['id']?>" class="btn btn-danger"> Apagar </a> </td>
    </tr>
    <?php
    }   
    ?>
</table>



