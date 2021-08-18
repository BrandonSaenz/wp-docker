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
    <title>Sol León</title>
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
    <nav style="" class="hide-on-med-and-down" id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <div class="div-logo div-center">
            <img class="width-img" src="https://cdn.shopify.com/s/files/1/0300/5926/6141/files/logo.png?v=1628872647">
        </div>
        <div class="div-center height-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu')); ?>
        </div>
    </nav>
    <nav style="" class="hide-on-large-only menu-movil" id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <a href="#" data-target="slide-out" class="sidenav-trigger">
            <div class="div-btn-menu div-center">
                <i class="material-icons btn-menu">menu</i>
            </div>
        </a>
        <div class="div-logo div-center">
            <img class="width-img" src="https://cdn.shopify.com/s/files/1/0300/5926/6141/files/logo.png?v=1628872647">
        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li><a class="sidenav-close" href="#!">
            <div class="div-left">
                <span class="material-icons">clear</span><span class="font-family: 'Montserrat' !important;">&nbsp;&nbsp;CERRAR</span>
            </div>
        </a></li>
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu')); ?>
    </ul>
</header>
