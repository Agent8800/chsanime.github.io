<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="header-left">
        <a href="<?php echo home_url(); ?>" class="logo">Stream<span>In</span></a>
    </div>
    <div class="nav-icons">
        <!-- Search Icon Link -->
        <a href="<?php echo home_url('/?s='); ?>">
            <svg class="nav-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
        </a>
        
        <!-- Hamburger Menu -->
        <div class="menu-toggle" onclick="document.querySelector('.mobile-menu').classList.toggle('active')">
            <span></span><span></span><span></span>
        </div>
    </div>
</header>
<!-- Simple Mobile Menu (You can style further) -->
<nav class="mobile-menu" style="display:none; position:fixed; top:60px; left:0; width:100%; background:white; padding:20px; z-index:99; border-bottom:1px solid #ddd;">
    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
</nav>
