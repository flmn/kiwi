<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/jquery.layout.js"></script>

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="/css/bp/ie.css" type="text/css" media="screen, projection" />
    <![endif]-->
    <link rel="stylesheet" href="/css/bp/screen.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/themes/<?php echo $sf_user->getAttribute('kiwi.theme') ?>/jquery-ui.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/themes/<?php echo $sf_user->getAttribute('kiwi.theme') ?>/theme.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/css/symfony.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/css/main.css" type="text/css" media="screen, projection" />
  </head>
  <body>
    <?php echo $sf_content ?>
  </body>
</html>
