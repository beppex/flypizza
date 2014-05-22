

<?php echo form_open('administrator/login'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
<?php echo form_error('username'); ?>

<h5>Password</h5>
<input type="password" name="password"  size="50" />
<?php echo form_error('password'); ?>

<div><input type="submit" value="Submit" /></div>

</form>
