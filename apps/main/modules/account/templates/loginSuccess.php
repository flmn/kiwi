<div style="height: 120px;">&nbsp;</div>
<div id="login-form">
  <form id="login" action="<?php echo url_for('@login') ?>" method="post">
    <fieldset>
      <legend><?php echo __('Login') ?></legend>
      <?php include_partial('common/form_errors', array('form' => $form)) ?>
      <table style="border: 0">
        <tr>
          <td style="text-align: right;width: 15em;"><?php echo $form['email']->renderLabel() ?></td>
          <td><?php echo $form['email']->render(array('class' => 'text')) ?></td>
          <td><?php if ($form['email']->hasError()): echo $form['email']->renderError(); endif; ?></td>
        </tr>
        <tr>
          <td style="text-align: right;width: 15em;"><?php echo $form['password']->renderLabel() ?></td>
          <td><?php echo $form['password']->render(array('class' => 'text')) ?></td>
          <td><?php if ($form['password']->hasError()): echo $form['password']->renderError(); endif; ?></td>
        </tr>
        <tr>
          <td style="text-align: right;width: 15em;"><?php echo $form['captcha']->renderLabel() ?></td>
          <td><?php echo $form['captcha']->render(array('class' => 'text')) ?></td>
          <td><?php if ($form['captcha']->hasError()): echo $form['captcha']->renderError(); endif; ?></td>
        </tr>
      </table>
      <hr/>
      <p>
        <input type="submit" value="<?php echo __('Submit') ?>" />
      </p>
    </fieldset>
  </form>
</div>
<div style="text-align: center;">
  <p>&nbsp;</p>
  <p>Copyright &copy; 2009 KIWI.</p>
</div>
