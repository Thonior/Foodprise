<aside class="menu-config">
	<ul><li class="title">CUENTA</li>
		<li><a href="">Perfil</a></li>
		<li><a href="">Preferencias</a></li>
		<li><a href="">Contraseña</a></li>
		<li><a href="">Notificaciones</a></li>
	</ul>
</aside>

<?php echo form_open(site_url('UserController/saveProfile'),array('class'=>'add-form config'));?>

<h2>Perfil</h2>

<div class="left-part">
	<label for="name">Name</label><br />
	    <input type="text" name="name" value="<?=set_value('name')?>" placeholder="Name"/><br />
	
	<?=form_error('name')?>
	
	<label for="lastname">Lastname</label><br />
	    <input type="text" name="lastname" value="<?=set_value('lastname')?>" placeholder="Lastname"/><br />
	
	<?=form_error('lastname')?>
	
	<label for="username">Username</label><br />
	    <input type="text" name="username" value="<?=set_value('username')?>" placeholder="Username"/><br />
	<?=form_error('username')?>
	
	<label for="location">Location</label><br />
	    <input type="text" name="location" value="<?=set_value('location')?>" placeholder="e.g. New York, NY"/><br />
	<?=form_error('location')?>
	
	<label for="twitter">Twitter</label><br />
	    <input type="text" name="twitter" value="<?=set_value('twitter')?>"/><br />
	<?=form_error('twitter')?>
	
	<label for="bio">Bio</label><br/>
	<textarea name="bio"></textarea><br/>
	
	<?=form_error('bio')?>
</div>

<h2>Account</h2>

<div class="left-part">
	<label for="email">Email</label><br/>
	    <input type="text" name="email" /><br/>
	<?=form_error('email')?>
	
	<label for="age">Age</label><br/>
	<select name="age">
	        <option value="none">I prefer not to say it</option>
	        <option value="0" <?php if($user['age']==0):?>selected<?php endif;?>>13 to 17</option>
	        <option value="1" <?php if($user['age']==1):?>selected<?php endif;?>>18 to 24</option>
	        <option value="2" <?php if($user['age']==2):?>selected<?php endif;?>>25 to 34</option>
	        <option value="3" <?php if($user['age']==3):?>selected<?php endif;?>>35 to 44</option>
	        <option value="4" <?php if($user['age']==4):?>selected<?php endif;?>>45 to 54</option>
	        <option value="5" <?php if($user['age']==5):?>selected<?php endif;?>>55+</option>
	</select><br/>
	
	<label for="gender">Gender</label><br/>
	    <select name="gender">
	            <option value="none">Not specified</option>
	            <option value="m" <?php if($user['gander']=='m'):?>selected<?php endif;?>>Male</option>
	            <option value="f" <?php if($user['gender']=='f'):?>selected<?php endif;?>>Female</option>
	    </select><br/>
</div>

<h2>Picture</h2>

<div class="left-part">
	<label for="img">Profile picture</label><br/>
	<input type="file" name="image" /><br/>
	
	<input type="submit" value="Save"/>
</div>
<?php echo form_close();?>