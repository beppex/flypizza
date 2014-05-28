<table>
    <tr>
        <th>Nominativo</th>
        <th>Indirizzo</th>
        <th>Orario</th>
        <th>Conto</th>
        <th>Stato</th>
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
        <?php echo anchor ('administrator/update_stato/'.$o->idordine,'Modifica') ?>
    </td>
    <?php
            echo "</tr>";
        }
    ?>
</table>

<?php    echo anchor('administrator/logout','Esci'); ?>