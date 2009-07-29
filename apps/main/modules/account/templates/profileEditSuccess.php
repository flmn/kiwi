<?php slot('sidebar') ?>
<?php include_partial('sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Edit Profile') ?></h3>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <form action="<?php echo url_for('account/profileEdit') ?>" method="post">
    <p>
      <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
    </p>
    <?php include_partial('common/form_errors', array('form' => $form)) ?>
    <fieldset>
      <legend><?php echo __('Basic') ?></legend>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'display_name',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'language',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'theme',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
    </fieldset>
    <fieldset>
      <legend><?php echo __('Change Password') ?></legend>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'password_old',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'password_new',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
      <p>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'password_again',
            'attributes' => array('class' => 'text'),
            )) ?>
      </p>
    </fieldset>
    <p>
      <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
    </p>
    <p>&nbsp;</p>
  </form>
</div>