<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="step2" style="display:none;">
<p class="title-add2">Detalles de artículo (Lo puedes cambiar más tarde)</p>
<form class="add-form add2" method="<?=site_url()?>">
	
	<div class="imgpart">
		<img src="<?=base_url()?>/public/img/add.jpg" alt="" />
		<span class="photo-footer">1024x768</span><br />
	</div>
	<div class="rightpart">
		<label for="title-in">Tìtulo</label><br/>
		<input type="text" name="web-in" /><br/>
		<label for="web-in">Enlace web</label><br/>
		<input type="url" name="email-in" /><br/>
		<label for="cat-in">Enlace web</label><br/>
		<select name="cat-in" placeholder="Escoge una categoría">
			<option>Cat 1</option>
		</select><br/>
		<label for="list-in">Enlace web</label><br/>
		<select  name="list-in" placeholder="Añade a listas...">
			<option>List 1</option>
		</select>
	</div>
	<textarea placeholder="Di algo sobre esto"></textarea>
	<div class="position">
		<input type="submit" name="add" />
		<a class="return" href="">Volver Atrás</a>	
	</div>
	<div
</form>
</div>