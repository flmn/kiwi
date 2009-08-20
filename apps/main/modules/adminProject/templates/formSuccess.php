<?php slot('sidebar') ?>
<?php include_partial('admin/sidebar') ?>
<?php end_slot() ?>

<div>
  <?php if ($form->isNew()): ?>
  <h3><?php echo __('New Project') ?></h3>
  <?php else: ?>
  <h3><?php echo __('Edit Project').': '.$project['name'] ?></h3>
  <?php endif; ?>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <?php echo form_tag_for($form, '@project') ?>
  <?php echo $form->renderHiddenFields() ?>
  <p>
    <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
  </p>
  <?php include_partial('common/form_errors', array('form' => $form)) ?>
  <table class="form">
    <thead>
      <tr>
        <th colspan="3">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'name',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'identifier',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'project_status',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'description',
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
