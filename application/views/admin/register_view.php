

<?php echo form_open('admin/utenti/update/'.(isset($id) ? $id : '')); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username', $username); ?>" size="50" />
<?php echo form_error('username'); ?>

<h5>Password</h5>
<input type="password" name="password"  size="50" />
<?php echo form_error('password'); ?>

<h5>Password Confirm</h5>
<input type="password" name="passconf"  size="50" />
<?php echo form_error('passconf'); ?>

<h5>Nominativo</h5>
<input type="text" name="nominativo" value="<?php echo set_value('nominativo',$nominativo); ?>" size="50" />
<?php echo form_error('nominativo'); ?>

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email',$email); ?>" size="50" />
<?php echo form_error('email'); ?>

<div><input type="submit" value="Submit" /></div>

</form>
