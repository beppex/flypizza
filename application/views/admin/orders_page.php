<table>
    <tr>
        <th>Nominativo</th>
        <th>Indirizzo</th>
        <th>Orario</th>
        <th>Conto</th>
        <th>Stato</th>
        <th colspan="2">Strumenti</th>
    </tr>
    <?php
        foreach ($ordini as $o) 
        {
            echo "<tr>";
            
            echo "<td>$o->nominativo</td>"
                ."<td>$o->indirizzo</td>"
                ."<td>$o->orario</td>"
                ."<td>$o->conto €</td>"
                ."<td>$o->stato</td>";
    ?>
    <td>
        <?php echo anchor ('admin/orders/update_stato/'.$o->idordine,'Modifica') ?>
    </td>
    <td>
        <?php echo anchor ('admin/orders/delete/'.$o->idordine,'Elimina') ?>
    </td>
    <?php
            echo "</tr>";
        }
    ?>
</table>

<?php    echo anchor('administrator/logout','Esci'); ?>