<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
    <div id="branding" style="display: none;">
    <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <?php
        if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; }
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span itemprop="name" style="display: none;">' . esc_html( get_bloginfo( 'name' ) ) . '</span></a>';
        if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; }
        ?>
</div>

<div id="site-description"<?php if ( !is_single() ) { echo ' itemprop="description"'; } ?>><?php bloginfo( 'description' ); ?></div>
</div>
    <nav class="hide-on-med-and-down" id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <div class="div-logo div-center">
            <img class="width-img" src="https://cdn.shopify.com/s/files/1/0300/5926/6141/files/logo.png?v=1628872647">
        </div>
        <div class="div-center height-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu')); ?>
        </div>
    </nav>
    <nav class="hide-on-large-only" id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="div-logo div-center">
            <img class="width-img" src="https://cdn.shopify.com/s/files/1/0300/5926/6141/files/logo.png?v=1628872647">
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
        <div class="background">
            <img src="images/office.jpg">
        </div>
        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
        <a href="#name"><span class="white-text name">John Doe</span></a>
        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>
</header>
