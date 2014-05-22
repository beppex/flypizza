<table>
    <tr>
        <th>Nominativo</th>
        <th>Username</th>
        <th>Email</th>
        <?php if(can_access($this->my_user)) {?>
        <th style="white-space: nowrap; "><?php echo anchor("admin/utenti/insert","&nbsp;",'class="button-add"');  ?></th>
        <?php } ?>
    </tr>
<?php
foreach ($utenti as $u) {
    echo '<tr>'.    
            "<td>$u->nominativo</td>".
            "<td>$u->username</td>".
            "<td>$u->email</td>";
    if(can_access($this->my_user)) {
       echo '<td style="white-space: nowrap">'.
                anchor("admin/utenti/edit/$u->id","&nbsp;",'class="button-edit"').
                anchor("admin/utenti/delete/$u->id","&nbsp;",'class="button-delete"').
            "</td>";
    }
    echo '</tr>';
}
?>
</table>
<?php echo $pagination; ?>