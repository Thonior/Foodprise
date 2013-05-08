<section>
	<article class="intro">
		<header class="intro-info">
			<div class="f-yellow"></div>
			<p class="title">Wellcome to Foodprise!</p>
			<p>The way to share your gastronomic discoveries and amaze your friends</p>
		</header>
		<img src="public/img/foodprise/intro.jpg" alt="Weelcome to Foodprise!" />
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