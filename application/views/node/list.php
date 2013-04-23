<?php foreach($nodes as $node):?>
        <div class="node-container">
            <h2>
                <?=$node['title']?>
            </h2>
            <img src="<?=base_url()?>public/img/foodprise/<?=$node['original']?>"/>
            <span>
                <?=$node['description']?>
            </span>
            <span>
                <?=$node['username']?>
            </span>
        </div>
<?php endforeach;?>
