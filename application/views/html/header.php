<body>
    
<header>
    <?php if(!$user):?>
    <a href="<?=site_url('login')?>">Log in</a> <a href="<?=site_url('register')?>">Register</a> 
    <?php else:?>
        <a href="<?=site_url('newfood')?>">New Foodprise</a>
        <a href="<?=site_url('logout')?>">Logout</a>
    <?php endif;?>
    
</header>
    
<div id="wrapper">
    

