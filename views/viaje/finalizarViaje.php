


<br>
<br>
<br>
<br>

<br>

<?php if(isset($_SESSION['finalizar']) && $_SESSION['finalizar'] == 'complete'): ?>
    <strong class="alert_green">El viaje se ha finalizado correctamente</strong>
<?php elseif(isset($_SESSION['finalizar']) && $_SESSION['finalizar'] != 'complete'): ?>
    <strong class="alert_red">El viaje NO se ha finalizado correctamente</strong>
<?php endif; ?>

<div class="w3-container">
    <table class="w3-table w3-bordered w3-striped" >
        <caption style="font-size: large;"><b>Factura proforma</b></caption>
        <tr>
            <th>KILOMETROS</th>
            <th>COMBUSTIBLE</th>
            <th>VIATICOS</th>
            <th>PEAJES Y PESAJES</th>
            <th>EXTRAS</th>
            <th>FEE</th>
            <th>TOTAL</th>
        </tr>

        <tr>
            <td><?=$proforma['kilometros'];?></td>
            <td><?=$proforma['combustible'];?></td>
            <td><?=$proforma['viaticos'];?></td>
            <td><?=$proforma['peajesYPesajes'];?></td>
            <td><?=$proforma['extras'];?></td>
            <td><?=$proforma['fee'];?></td>
            <td><?=$proforma['total'];?></td>
            <td>
                <a href="<?=base_url?>verPdfProforma.php?id=<?=$model->id?>" class="w3-button w3-red">Ver pdf</a>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table class="w3-table w3-bordered w3-striped" >
        <caption style="font-size: large;"><b>Factura final chofer</b></caption>
        <tr>
            <th>KILOMETROS</th>
            <th>COMBUSTIBLE</th>
            <th>VIATICOS</th>
            <th>PEAJES Y PESAJES</th>
            <th>EXTRAS</th>
            <th>FEE</th>
            <th>TOTAL</th>
        </tr>
        <tr>
            <td><?=$facturaFinalChofer['kilometros'];?></td>
            <td><?=$facturaFinalChofer['combustible'];?></td>
            <td><?=$facturaFinalChofer['viaticos'];?></td>
            <td><?=$facturaFinalChofer['peajesYPesajes'];?></td>
            <td><?=$facturaFinalChofer['extras'];?></td>
            <td><?=$facturaFinalChofer['fee'];?></td>
            <td><?=$facturaFinalChofer['total'];?></td>
            <td>
            <td>
                <a href="<?=base_url?>verPdf.php?id=<?=$model->id?>" class="w3-button w3-red">Ver pdf</a>
            </td>
        </tr>
    </table>


</div>




