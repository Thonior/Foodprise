<section>
<!--	<article class="intro">
		<header class="intro-info">
			<div class="f-yellow"></div>
			<p class="title">Wellcome to Foodprise!</p>
			<p>The way to share your gastronomic discoveries and amaze your friends</p>
		</header>
		<img src="public/img/foodprise/intro.jpg" alt="Weelcome to Foodprise!" />
	</article>-->
	<?php foreach($nodes as $node):?>
	        <article>
	            <img class="avatar" src="public/img/foodprise/avatar.jpg" alt="" />
	            	<ul class="image-list">
                        <li><img src="<?=base_url()?>public/img/foodprise/<?=$node['original']?>"/>
	            			<a href="<?=  site_url('foodprise')?>/<?=$node['id']?>">
	            				<ul>
	            					<li class="x-layer"><span class="buttonadd" onclick="alert('hola');">Añadir Foodprise</span>
	            					</li>
	            				</ul>
	            			</a>
	            		</li>
	           		</ul>
	            <p>
	                <a href=""><?=$node['description']?></a>
	            </p>
	            <p>
	                <?=$node['username']?>
	            </p>
	        </article>
	<?php endforeach;?>
</section>
