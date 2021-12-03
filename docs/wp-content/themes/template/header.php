<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/app.css">
    <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml">
    <title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_deregister_script( 'jquery' ); ?>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container header-container">
        <a class="logo" href="/">Бизнес-комплекс на русаковской</a>
        <nav class="header-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <a href="#office-list" itemprop="url" class="header-nav-elem">
                <span itemprop="name" class="header-nav-text">Аренда офиса</span>
            </a>
            <a href="#contacts" itemprop="url" class="header-nav-elem">
                <span itemprop="name" class="header-nav-text">Контакты</span>
            </a>
            <a href="tel:+74994018888" itemprop="url" class="header-nav-elem">
                <span itemprop="name" class="header-nav-text">+7 (499) 401-88-88</span>
            </a>
        </nav>
    </div>
</header>
