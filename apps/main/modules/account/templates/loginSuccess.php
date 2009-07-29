<div style="height: 120px;">&nbsp;</div>
<div id="login-form">
  <form id="login" action="<?php echo url_for('@login') ?>" method="post">
    <fieldset>
      <legend><?php echo __('Login') ?></legend>
      <?php include_partial('common/form_errors', array('form' => $form)) ?>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'email',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'password',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'captcha',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
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
