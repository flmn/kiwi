<?php if ($pager->haveToPaginate()): ?>
<a href="<?php echo url_for('@'.$route) ?>?page=1">
    <?php echo image_tag($sf_user->getThemeImage('first.png'), array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?>
</a>
<span>&nbsp;</span>
<a href="<?php echo url_for('@'.$route) ?>?page=<?php echo $pager->getPreviousPage() ?>">
    <?php echo image_tag($sf_user->getThemeImage('previous.png'), array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?>
</a>
<span>&nbsp;</span>
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <?php echo $page ?>
    <?php else: ?>
<a href="<?php echo url_for('@'.$route) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
    <?php endif; ?>
<span>&nbsp;</span>
  <?php endforeach; ?>
<a href="<?php echo url_for('@'.$route) ?>?page=<?php echo $pager->getNextPage() ?>">
    <?php echo image_tag($sf_user->getThemeImage('next.png'), array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?>
</a>
<span>&nbsp;</span>
<a href="<?php echo url_for('@'.$route) ?>?page=<?php echo $pager->getLastPage() ?>">
    <?php echo image_tag($sf_user->getThemeImage('last.png'), array('alt' => __('Last page', array(), 'sf_admin'), 'title' => __('Last page', array(), 'sf_admin'))) ?>
</a>
<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
<?php endif; ?>
<?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
<?php if ($pager->haveToPaginate()): ?>
  <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
<?php endif; ?>
