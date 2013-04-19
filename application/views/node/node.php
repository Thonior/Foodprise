<?php // echo "<pre>";print_r($node);die;?>
<div class="node-container">
    <h2><?=$node['title']?></h2>
    <span><?=$category['tag']?></span>
    <img src="<?=base_url()?>public/img/foodprise/<?php echo $node['original']?>"/>
    <span><?=$node['description']?></span>
</div>
