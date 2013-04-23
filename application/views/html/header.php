<body>
<header>
    <div id="logo">
        <img src="<?php echo base_url();?>public/img/logo.png"/>
        <img src="<?php echo base_url();?>public/img/banner.png"/>
    </div>
    <div class="menu">
        <div id="menu">
        <ul>
            <li><div class="option"><div style="padding-top: 20px;"><a href="<?=site_url('home')?>">Home</a></div></div></li>
            <li id="root"><div class="option"><div style="padding-top: 20px;">Categories</div></div></li>
            <li><div class="option"><div style="padding-top: 20px;">Boxes</div></div></li>
            <li><div class="option"><div style="padding-top: 20px;"><a href="<?=site_url('newfood')?>">Add</a></div></div></li>
            <li><div class="option"><div style="padding-top: 20px;">Invite</div></div></li>
            <li>
                <?php if(!$user):?>
                    <div class="option"><div style="padding-top: 20px;"><a href="<?=site_url('login')?>">Log in</a></div></div> 
                    <div class="option"><div style="padding-top: 20px;"><a href="<?=site_url('register')?>">Register</a> </div></div>
                <?php else:?>
                    <div class="option"><div style="padding-top: 20px;"><a href="<?=site_url('logout')?>">Logout</a></div></div>
                <?php endif;?>
            </li>
            <li><div style="padding-top: 20px;width: 150px;height: 75px;float:left;"><input class="search" id="search-header" type="text" name="search" placeholder="Search"/></div></div></li>
        </ul>
        
        </div>
    </div>
    
    
</header>
    <div id="dropdown">
        <ul>
            <?php foreach($categories as $category):?>
                <li><div class="option"><a href="<?=site_url('category')?>/<?=$category['tag']?>"><?=$category['tag']?></a></div></li>
            <?php endforeach;?>
        </ul>
    </div>
<div id="wrapper">
    
<script>
    
</script>
