
<div id="node-list">
    
    
</div>
<div id="filter-info" data-page="<?=$page?>" data-user="<?=$user['id']?>"/>

<script>
$(document).ready(function(){
    var user = $('#filter-info').data('user');
    var page = $('#filter-info').data('page');
    $('#node-list').load('<?=  site_url('NodeController/pullProfileNodes')?>/'+user+'/'+page);
});    
</script>