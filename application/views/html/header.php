<body>
<div id="content">
	<header>
	    <div id="food-prise">
                <a href="<?=site_url('home')?>"><img src="<?php echo base_url();?>public/img/logo.png"/></a>
	        <a href="<?=site_url('home')?>"><img class="float-right" src="<?php echo base_url();?>public/img/banner.jpg"/></a>
	    </div>
	    
	    <nav>
	    	<div class="logo floated"></div>
		        <ul id="menu">
		            <li><a href="<?=site_url('home')?>">Home</a></li>
		            <li id="root"><a href="#">Categories</a></li>
		            <li><a href="<?=site_url('home')?>">Boxes</a></li>
                            <?php if($user):?>
		            <li class="add"><a href="#">Add</a></li>
                            <?php else:?>
                            <li><a href="<?=site_url('login')?>">Add</a></li>
                            <?php endif;?>
                            <?php if($user):?>
		            <li><a href="<?=site_url('invite')?>">Invite</a></li>
                            <?php else:?>
                            <li><a href="<?=site_url('login')?>">Invite</a></li>
                            <?php endif;?>
                            <?php if(!$user):?>
                            <li>
                                <a class="double" href="<?=site_url('login')?>">Log in</a>
                            </li>
                               <!--<a class="double" href="<?=site_url('register')?>">Register</a>-->
                            <?php else:?>
                            <li id="root2">
                               <a href="<?=site_url('profile')?>">You</a><span class="user"></span>
                            </li>
                            <?php endif;?>
		            <li class="end">
		            	<input class="search" id="search-header" type="text" name="search" placeholder="Search now" />
		            </li>
		        </ul>
	    </nav>
	    <div id="dropdown">
	        <ul>
	            <?php foreach($categories as $category):?>
	                <li><div class="option"><a href="<?=site_url('category')?>/<?=$category['tag']?>"><?=$category['tag']?></a></div></li>
	            <?php endforeach;?>
	        </ul>
	    </div>
            
            <div id="dropdown2">
	        <ul>
                    <li><div class="option"><a href="<?=site_url('configuration')?>">Configuration</a></div></li>
                    <li><div class="option"><a href="<?=site_url('logout')?>">Log out</a></div></li>
	        </ul>
	    </div>
	    
	</header>
	
	<div id="wrapper">

