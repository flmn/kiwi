<?php if ($column == $sort[0]): ?>
  <?php echo link_to(__($title), '@'.$route.'?sort='.$column.'&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc')) ?>
  <?php echo image_tag($sf_user->getThemeImage($sort[1].'.png'), array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
<?php else: ?>
  <?php echo link_to(__($title), '@'.$route.'?sort='.$column.'&sort_type=asc') ?>
<?php endif; ?>
