<section>
	<article class="intro">
			<p>Invite and Foodprise! your friends</p>
	</article>
</section>
<div id="node-list">
    
    
</div>
<div id="filter-info" data-page="<?=$page?>" data-category="<?=$category?>"/>

<script>
$(document).ready(function(){
    var category = $('#filter-info').data('category');
    var page = $('#filter-info').data('page');
    $('#node-list').load('<?=  site_url('NodeController/pullNodes')?>/'+page+'/'+category);
});    
</script>