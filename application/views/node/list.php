<?php foreach($nodes as $node):?>
        <div class="node-container">
            <h2>
                <?=$node['title']?>
            </h2>
            <div class="node-image">
                <img src="<?=base_url()?>public/img/foodprise/<?=$node['original']?>"/>
            </div>
            <div class="node-desc">
                <?=$node['description']?>
            </div>
            <div class="node-more">
                <?=$node['username']?>
            </div>
        </div>
<?php endforeach;?>
