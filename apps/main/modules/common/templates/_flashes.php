<?php if ($sf_user->hasFlash('success')): ?>
  <div class="success"><?php echo __($sf_user->getFlash('success'), array(), 'sf_admin') ?></div>
<?php endif; ?>
  <?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
<?php endif; ?>
