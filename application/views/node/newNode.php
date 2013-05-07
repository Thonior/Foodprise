<?php echo form_open(site_url('NodeController/checkNode'),array('class'=>'add-form'));?>
<label for="title">Title</label><br/>
<input type="text" name="title" value="<?=set_value('title')?>" placeholder="Title"/><br/>

<?=form_error('title')?>
<label for="descpription">Description</label><br/>
<textarea name="description"></textarea><br/>

<?=form_error('description')?>

<label for="img">Image</label><br/>
<input type="file" name="image" /><br/>

<label for="category"></label><br/>
<select name="category">
   <option value="">Select a category</option>
   <?php foreach($categories as $category):?>
        <option value="<?=$category['id']?>"><?=$category['tag']?></option>
   <?php endforeach;?>
</select><br/>

<label for="tags">Tags</label><br/>
<input id="tags" type="text" name="tags" value="<?=set_value('tags')?>"/><br/>

<input type="submit" value="New Foodprise!"/>
<?php echo form_close();?>

<script>
    $('#tags').tagsInput();
</script>