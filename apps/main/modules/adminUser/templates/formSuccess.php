<?php slot('sidebar') ?>
<?php include_partial('admin/sidebar') ?>
<?php end_slot() ?>

<div>
  <?php if ($form->isNew()): ?>
  <h3><?php echo __('New User') ?></h3>
  <?php else: ?>
  <h3><?php echo __('Edit User').': '.$user->getDisplayName() ?></h3>
  <?php endif; ?>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <?php echo form_tag_for($form, '@user') ?>
  <?php echo $form->renderHiddenFields() ?>
  <p>
    <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
  </p>
  <?php include_partial('common/form_errors', array('form' => $form)) ?>
  <table>
    <thead>
      <tr>
        <th colspan="3"><?php echo __('Info') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'email',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'password',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'password_again',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'display_name',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'is_active',
          'attributes' => array(),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'is_admin',
          'attributes' => array(),
          )) ?>
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
  <p>
    <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
  </p>
  <p>&nbsp;</p>
</form>
</div>
