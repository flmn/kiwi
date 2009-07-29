<?php echo $form[$name]->renderLabel() ?><br/>
  <?php echo $form[$name]->render($attributes) ?><br/>
<?php if ($form[$name]->hasError()): ?>
  <?php echo $form[$name]->renderError(); ?>
<?php endif; ?>
