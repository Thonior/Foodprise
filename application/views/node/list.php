
<!--	<article class="intro">
		<header class="intro-info">
			<div class="f-yellow"></div>
			<p class="title">Wellcome to Foodprise!</p>
			<p>The way to share your gastronomic discoveries and amaze your friends</p>
		</header>
		<img src="public/img/foodprise/intro.jpg" alt="Weelcome to Foodprise!" />
	</article>-->
	<?php foreach($nodes as $node):?>
	        <article class="infinite-item">
	       	    <h2>
	                <a href="<?=site_url('foodprise')?>/<?=$node['id']?>"><?=$node['title']?></a>
	            </h2>
	            <img class="avatar" src="public/img/foodprise/avatar.jpg" alt="" />
	            
	            <ul class="image-list">
	            	<li><img src="<?=base_url()?>public/img/foodprise/<?=$node['original']?>"/>
	            		<ul><li><a href="" class="button add">Añadir Foodprise</a></li></ul>
	            	</li>
	            </ul>
	            	
	            <p>
	                <?=$node['description']?>
	            </p>
	            <p>
	                <?=$node['username']?>
	            </p>
	        </article>
	<?php endforeach;?>
<a href="<?=site_url('NodeController/pullNodes')?>" class="infinite-more-link" style="visibility:hidden;">More</a>