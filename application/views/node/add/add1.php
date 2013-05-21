<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="step1" class="add1">
	<p class="title">Add to Foodprise!</p>
	<ul>
		<li><a id="web-button" class="orange" href="#">From web</a></li>
		<li><a id="upload-button" class="orange2" href="#">Upload</a></li>
		<li><a class="grey" href="#">Email</a></li>
	</ul>
	<div class="up-arrow"></div>
	<p>Drag this button to your bookmarks Bar and Foodprise! it, easily from any site [?]</p>
</div>

<div id="from-web" style="display:none;">
    <?php echo form_open(site_url('NodeController/checkAdd1'),array('class'=>'add-form'));?>
        <label for="url">Introduce an image url or a web address</label><br/>
        <input type="text" name="url" value="<?=set_value('url')?>" placeholder="http://"/>
        <input type="hidden" name="mode" value="web"/>
    <?php echo form_close();?>
        <div class="foodprise">Send</div>
        <a class="return" href="#">Go back</a>	

    
</div>

<div id="upload" style="display:none;">
    <?php echo form_open_multipart(site_url('NodeController/checkAdd1'),array('class'=>'add-form','id'=>'imageform'));?>
        <label for="img">Select an image from your computer to upload it</label><br/>
        <input type="file" name="photoimage" id="photoimage"/><br/>
        <input type="hidden" name="mode" value="upload"/>
    <?php echo form_close();?>
        <div class="foodprise">Send</div>
        <a class="return" href="#">Go back</a>	
    
</div>

<div id="step2" style="display:none;">
<p class="title-add2">Detalles de artículo (Lo puedes cambiar más tarde)</p>
<form class="add-form add2" method="POST" action="<?=site_url('NodeController/checkNode')?>">
	<div class="imgpart">
            <div id="preview"></div>
            <!--<img src="<?=base_url()?>/public/img/add.jpg" alt="" />-->
            <span class="photo-footer">1024x768</span><br />
	</div>
	<div class="rightpart">
		<label for="title-">Title</label><br/>
		<input type="text" name="title" /><br/>
		<label for="web-in">Enlace web</label><br/>
		<input type="url" name="email-in" /><br/>
		<label for="cat-in">Enlace web</label><br/>
		<select name="cat-in" placeholder="Escoge una categoría">
			<option>Cat 1</option>
		</select><br/>
		<label for="category">Category</label><br/>
		<select name="category">
                    <option value="">Select a category</option>
                    <?php foreach($categories as $category):?>
                         <option value="<?=$category['id']?>"><?=$category['tag']?></option>
                    <?php endforeach;?>
                 </select>
	</div>
	<textarea name="description" placeholder="Say something about this"></textarea>
	<div class="position">
		<input type="submit" name="add" />
		<a class="return" href="#">Volver Atrás</a>	
	</div>
</form>
</div>
<script>
    $('#web-button').click(function(){
        $('#step1').hide();
        $('#from-web').show();
        $('.ui-dialog').css('height','300px');
        $('.ui-dialog').css('top','30%');
    });
    
    $('#upload-button').click(function(){
        $('#step1').hide();
        $('#upload').show();
        $('.ui-dialog').css('height','300px');
        $('.ui-dialog').css('top','30%');
    });
    $('.return').click(function(){
        $('#from-web').hide();
        $('#upload').hide();
        $('#step2').hide();
        $('#step1').show();
        $('.ui-dialog').css('height','660px');
        $('.ui-dialog').css('top','8%');
    });
    $('.foodprise').click(function(){
        $('#from-web').hide();
        $('#upload').hide();
        $('#step2').show();
        $('.ui-dialog').css('height','660px');
        $('.ui-dialog').css('top','8%');
    });
    $('#photoimg').change(function(){ 
        alert('hola');
        $("#preview").html('');
        $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
        $("#imageform").ajaxForm({
            target: '#preview'
        }).submit(function(){
                $('#from-web').hide();
                $('#upload').hide();
                $('#step2').show();
                $('.ui-dialog').css('height','660px');
                $('.ui-dialog').css('top','8%');
            });
    });
</script>