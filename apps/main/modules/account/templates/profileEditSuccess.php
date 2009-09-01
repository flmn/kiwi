<?php slot('sidebar') ?>
<?php include_partial('sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Edit Profile') ?></h3>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <form action="#" method="post">
    <p>
      <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
    </p>
    <?php include_partial('common/form_errors', array('form' => $form)) ?>
    <table class="form">
      <thead>
        <tr>
          <th colspan="3"><?php echo __('Basic') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'language',
            'attributes' => array('class' => 'text'),
            )) ?>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'theme',
            'attributes' => array('class' => 'text'),
            )) ?>
      </tbody>
    </table>
    <table class="form">
      <thead>
        <tr>
          <th colspan="3"><?php echo __('Change Password') ?></th>
        </tr>
      </thead>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'password_old',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'password_new',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'password_again',
          'attributes' => array('class' => 'text'),
          )) ?>
    </table>
    <p>
      <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
    </p>
    <p>&nbsp;</p>
  </form>
</div>