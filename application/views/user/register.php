<?php echo form_open(site_url('UserController/checkRegister'),array('class'=>'add-form'));?>
<label for="username">Username
    <input type="text" name="username" value="<?=set_value('username')?>" placeholder="Username"/>
</label>
<?=form_error('username')?>
<label for="email">Email
    <input type="text" name="email" value="<?=set_value('email')?>" placeholder="Email"/>
</label>
<?=form_error('email')?>
<label for="password">Password
    <input type="password" name="password" />
</label>
<?=form_error('password')?>
<input type="submit" value="Join!"/>
<?php echo form_close();?>