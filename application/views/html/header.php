<body>
    
<header>
    <div class="menu">
        <ul>
            <li><a href="<?=site_url('home')?>">Home</a></li>
            <li id="root">Categories</li>
            <li>Boxes</li>
            <li><a href="<?=site_url('newfood')?>">Add</a></li>
            <li>Invite</li>
            <li>
                <?php if(!$user):?>
                    <a href="<?=site_url('login')?>">Log in</a> <a href="<?=site_url('register')?>">Register</a> 
                <?php else:?>
                    <a href="<?=site_url('logout')?>">Logout</a>
                <?php endif;?></li>
        </ul>
    </div>
    <div class="search"><input id="search-header" type="text" name="search" placeholder="Search"/></div>
    
</header>
    <div id="dropdown">
        <ul>
            <?php foreach($categories as $category):?>
                <li><a href="<?=site_url('category')?>/<?=$category['tag']?>"><?=$category['tag']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
<div id="wrapper">
    
<script>
    $('#root').mouseover(function(){
        $('#dropdown').css('display','block');
    });
</script>
