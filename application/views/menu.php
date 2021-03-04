<?php
$module = $this->uri->segment(1);?>
<ul id="main-nav">
    <li><a href="<?=site_url('visitors/index')?>" class="nav-top-item no-submenu <?=selected($module, 'visitors')?>">Visitors</a></li>
    <?php if($role == 'admin'){ ?>
    	<li><a href="<?=site_url('users/index')?>" class="nav-top-item no-submenu <?=selected($module, 'users')?>">Users</a></li>
    <?php } ?>
    <li><a href="<?=site_url('profile/index')?>" class="nav-top-item no-submenu <?=selected($module, 'profile')?>">My Profile</a></li>
    <li><a href="<?=site_url('home/logout')?>" class="nav-top-item no-submenu <?=selected($module, 'content')?>">Sign Out</a></li>
</ul>