<?php echo form_open_multipart('NodeController/checkNode');?>
<label for="title">Title
    <input type="text" name="title" value="<?=set_value('title')?>" placeholder="Title"/>
</label>
<?=form_error('title')?>
<label for="descpription">Description
    <textarea name="description"></textarea>
</label>
<?=form_error('description')?>
<label for="img">Image
    <input type="file" name="image" />
</label>
<label for="category">
       <select name="category">
           <option value="">Select a category</option>
           <?php foreach($categories as $category):?>
                <option value="<?=$category['id']?>"><?=$category['tag']?></option>
           <?php endforeach;?>
       </select>
</label>
<label for="tags">Tags
    <input id="tags" type="text" name="tags" value="<?=set_value('tags')?>"/>
</label>
<input type="submit" value="New Foodprise!"/>
<?php echo form_close();?>

<script>
    $('#tags').tagsInput();
</script>