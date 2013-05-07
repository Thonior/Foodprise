<?php echo form_open(site_url('AdminController/sendInvites'),array('class'=>'tuclase'));?>

<label for="emails">Introduce separated by commas the emails of the users you want to invite
    <textarea name="emails" rows="4" cols="50"><?=set_value('emails')?></textarea>
</label>
<input type="submit" value="Send invitations"/>
<?php echo form_close();?>