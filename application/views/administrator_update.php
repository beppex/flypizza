<?php 
echo form_open('administrator/update_stato');
?>
    Stato dell'Ordine:<br/>
    <select name="stato">
        <option value="attesa">Attesa</option>
        <option value="consegna">Consegna</option>
    </select>
    <input type="submit"/>
</form>

<?php echo anchor('administrator/orders_page','Torna Indietro')?>