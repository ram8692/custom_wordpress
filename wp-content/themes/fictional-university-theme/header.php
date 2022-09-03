<!DOCTYPE html>
<!-- page language attr -->
<html <?php language_attributes();?>>

<head>
    <!-- setting up meta charset -->
    <meta charset="<?php bloginfo('charset')?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <?php wp_head() ?>
</head>
<!-- body classes from wordpress -->
<body <?php body_class()?>>
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href="<?=site_url()?>"><strong>Fictional</strong> University</a>
            </h1>
            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <ul> 
                        <!-- if current pages is about us or current page are child page of about us the n add the class -->
                        <li <?php if(is_page('about-us') or wp_get_post_parent_id(0) == 10) echo 'class="current-menu-item"' ?>><a href="<?=site_url('/about-us')?>">About Us</a></li>
                        <li <?php if(get_post_type() == 'program'){ echo 'class="current-menu-item"'; } ?>><a href="<?=get_post_type_archive_link('program')?>">Programs</a></li>
                        <li <?php if(get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"'?>><a href="<?php echo site_url('/events')?>">Events</a></li>
                        <li <?php if(get_post_type() == 'campus'){ echo 'class="current-menu-item"'; }?>><a href="<?=site_url('/campuses')?>">Campuses</a></li>
                        <li <?php if(get_post_type() == 'post') echo 'class="current-menu-item"'?>><a href="<?=site_url('/blog')?>">Blog</a></li>
                    </ul> 
                    <?php
                    //wp_nav_menu(['theme_location'=>'headerMenuLocation']);
                    ?>
                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                    <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </header>