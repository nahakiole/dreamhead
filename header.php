<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge,chrome=1">
    <title><?php wp_title('-', true, 'right'); bloginfo('name') ?></title>
    <meta name="description"
          content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="navbar navbar-transparent navbar-static-top"
     role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle"
                    data-toggle="collapse"
                    data-target="#main-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"
               href="<?php bloginfo('url') ?>">
                <?php
                    echo file_get_contents('http://cdn.dreamhead.ch/assets/logo-v3.svg');
                ?>
            </a>
        </div>
        <div class="collapse navbar-collapse"
             id="main-navigation">

                <?php
                $args = array(
                    'menu' => 'header-menu',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'container' => 'false'
                );
                wp_nav_menu($args);
                ?>

        </div>
    </div>
</div>