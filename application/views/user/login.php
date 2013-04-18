<?php echo form_open(site_url('UserController/checkLogin'));?>
<label for="username">Username
    <input type="text" name="username" value="<?=set_value('username')?>" placeholder="Username"/>
</label>
<?=form_error('username')?>
<label for="password">Password
    <input type="password" name="password" />
</label>
<?=form_error('password')?>
<input type="submit" value="Log in"/>
<?php echo form_close();?>