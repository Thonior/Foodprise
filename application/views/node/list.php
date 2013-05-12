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
	            
	            	<ul class="image-list">
                            <li><img src="<?=base_url()?>public/img/foodprise/<?=$node['original']?>"/>
                                <span class="link" href="#">
                                    <ul>
                                        <li class="x-layer">
                                            <?php if($user):?>
                                            <span <?php if($node['liked']):?>style="display:none;"<?php endif;?> class="buttonadd" id="like-<?=$node['id']?>" onclick="like(<?=$node['id']?>)"></span>
                                            <span <?php if(!$node['liked']):?>style="display:none;"<?php endif;?> class="buttonadd" id="unlike-<?=$node['id']?>" onclick="unlike(<?=$node['id']?>)"></span>
                                            <?php // else:?>
                                            
                                            <?php endif;?>
                                        </li>
                                    </ul>
                                </span>
                            </li>
                        </ul>
                <img class="avatar" src="public/img/foodprise/avatar.jpg" alt="" />
	            <p class="author-node">
	                <a href=""><?=$node['description']?></a><br />
	                <?=$node['username']?>
	            </p>
	            
	        </article>
	<?php endforeach;?>
</section>

<script>
    
    function show(id){
        window.location = "<?=site_url('foodprise')?>/"+id;
    }
    
    function like(id){
        var request = $.ajax({
            type: "GET",
            url: '<?=site_url('NodeController/likeNode')?>/'+id,
        });

        request.done(function (response, textStatus, jqXHR){
            $('#like-'+id).fadeOut(0);
            $('#unlike-'+id).fadeIn(0);
        });
    }
    
    function unlike(id){
        var request = $.ajax({
            type: "GET",
            url: '<?=site_url('NodeController/unlikeNode')?>/'+id,
        });

        request.done(function (response, textStatus, jqXHR){
            $('#like-'+id).fadeOut(0);
            $('#unlike-'+id).fadeIn(0);
        });
    }
</script>
    