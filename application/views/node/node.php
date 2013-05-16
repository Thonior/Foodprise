<?php // echo "<pre>";print_r($node);die;?>
<section class="fact">
	<article>
		<ul class="image-list">
		    <li><img src="<?=base_url()?>public/img/foodprise/<?php echo $node['original']?>"/>
				<span class="link" <?php /* href="<?=  site_url('foodprise')?>/<?=$node['id']?>"*/?>>
					<ul>
						<li class="x-layer">
                                                    <?php if($user):?>
                                                        <span <?php if($liked):?>style="display:none;"<?php endif;?> class="buttonadd" id="like-<?=$node['id']?>" onclick="like(<?=$node['id']?>)"></span>
                                                        <span <?php if(!$liked):?>style="display:none;"<?php endif;?> class="buttonadd" id="unlike-<?=$node['id']?>" onclick="unlike(<?=$node['id']?>)"></span>
                                                        <?php // else:?>

                                                    <?php endif;?>
						</li>
					</ul>
				</span>
			</li>
			</ul>
	</article>
</section>
<aside class="fact">
    <h2><?=$node['title']?></h2>
    <p class="cat-fact"><?=$category['tag']?></p>
    <p><?=$node['description']?></p>
    <div class="social">
    	<div class="g-plusone" data-size="medium" data-annotation="none"></div>
    	<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="none">Twittear</a>
    	<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.foodprise.com&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=132341493503388" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:105px; height:21px;" allowTransparency="true"></iframe>
</aside>
<script>
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
            $('#unlike-'+id).fadeOut(0);
            $('#like-'+id).fadeIn(0);
        });
    }
    </script>