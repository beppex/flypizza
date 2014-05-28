<?php 
echo form_open('admin/orders/update_stato');
?>
<table>
    <tr>
        <td>Stato dell'Ordine:</td>
        <td>
            <select name="stato">
                <option value="attesa">Attesa</option>
                <option value="consegna">In Consegna</option>
                <option value="consegnato">Consegnato</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Codice dell'Ordine:</td>
        <td>
            <input type="text" name="idordine" size='5' value="<?php echo set_value('idordine',$idordine); ?>" />
        </td>
    </tr>
</table>
    <input type="submit"/>
</form>
<?php echo anchor('admin/orders/page','Torna Indietro')?>