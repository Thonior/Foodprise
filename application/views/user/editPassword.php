<aside class="menu-config">
	<ul><li class="title">Account</li>
		<li><a href="<?=site_url('configuration')?>">Profile</a></li>
		<li><a href="<?=site_url('password')?>">Preferences</a></li>
		<li><a href="<?=site_url('password')?>">Password</a></li>
		<li><a href="">Notifications</a></li>
	</ul>
</aside>
<?php echo form_open(site_url('UserController/savePassword'),array('class'=>'add-form config'));?>

<h2>Password</h2>

<div class="left-part">
	<label for="password">Password</label><br />
	    <input type="password" name="password" placeholder="Password"/><br />
	<?=form_error('password')?>
        <label for="password">Repeat Password</label><br />
	    <input type="password" name="rep_password" placeholder="Repeat Password"/><br />
	<?=form_error('rep_password')?>
</div>



<input type="hidden" name="id" value="<?=$user['id']?>"/>
<?php echo form_close();?>