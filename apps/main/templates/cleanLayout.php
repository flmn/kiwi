<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />    
    <?php include_javascripts() ?>
    <!--[if lt IE 8]>
    <link rel="stylesheet" href="/css/bp/ie.css" type="text/css" media="screen" />
    <![endif]-->
    <?php include_stylesheets() ?>
    <link rel="stylesheet" href="/themes/<?php echo $sf_user->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi') ?>/jquery-ui.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/themes/<?php echo $sf_user->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi') ?>/theme.css" type="text/css" media="screen" />
  </head>
  <body>
    <?php echo $sf_content ?>
  </body>
</html>
