<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $sf_user->getCulture() ?>" lang="<?php echo $sf_user->getCulture() ?>">
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
    <link rel="stylesheet" href="/css/symfony.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/themes/<?php echo $sf_user->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi') ?>/jquery-ui.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="/themes/<?php echo $sf_user->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi') ?>/theme.css" type="text/css" media="screen, projection" />
  </head>
  <body>
    <div id="north" class="ui-layout-north kiwi-panel">
      <div id="header">
        <div id="logo">
          <a href="<?php echo url_for('homepage') ?>"><img alt="logo" src="/img/logo.png" /></a>
        </div>
        <div id="tools">
          <div id="menu">
            <?php echo __('Welcome') ?>, <?php echo $sf_user->getAttribute('display_name', 'User', 'kiwi') ?> [<?php echo link_to(__('Logout'), 'account/logout') ?>] | <?php echo link_to(__('Profile'), 'account/profile') ?><?php if ($sf_user->hasCredential('site_admin')): ?> | <?php echo link_to(__('Admin'), 'admin/index') ?><?php endif ?> | <?php echo link_to(__('Help'), 'help/index') ?>
          </div>
          <div id="search">
            <form action="<?php echo url_for('home/index') ?>">
              <input type="text" value="" size="20" id="query_string" name="query_string" />
              <input type="submit" value="<?php echo __('Search') ?>" />
            </form>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <?php include_slot('navigation') ?>
    </div>

    <div id="west" class="ui-layout-west kiwi-panel">
      <?php if (!include_slot('sidebar')): ?>
      <p>&nbsp;</p>
      <?php endif; ?>
    </div>

    <div id="center" class="ui-layout-center">
      <?php echo $sf_content ?>
    </div>

    <div id="south" class="ui-layout-south kiwi-panel">
      <p>Copyright &copy; 2009 KIWI.</p>
    </div>

    <script type="text/javascript">
      var layout;
      $(document).ready(function () {
        layout = $('body').layout(layout_settings);
        $('#navigation > ul > li').mouseenter(function(){$(this).addClass("ui-state-hover")}).mouseout(function(){$(this).removeClass("ui-state-hover")});
      });

      var layout_settings = {
        defaults: {
          spacing_open: 0,
          togglerLength_open: 0,
          togglerLength_closed:	-1,
          resizable: false,
          slidable: false,
          fxName: "none"
        },
        north: {
          size: <?php if (has_slot('navigation')): echo '120'; else: echo '80'; endif; ?>
        },
        west: {
          size: 200
        },
        center: {
          applyDefaultStyles: true
        },
        south: {
          size: 30
        }
      };
    </script>
  </body>
</html>
