<?php slot('sidebar') ?>
<?php include_partial('admin/sidebar') ?>
<?php end_slot() ?>

<div>
  <?php if ($form->isNew()): ?>
  <h3><?php echo __('New Role') ?></h3>
  <?php else: ?>
  <h3><?php echo __('Edit Role').': '.$role['name'] ?></h3>
  <?php endif; ?>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <?php echo form_tag_for($form, '@role') ?>
  <?php echo $form->renderHiddenFields() ?>
  <p>
    <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
  </p>
  <?php include_partial('common/form_errors', array('form' => $form)) ?>
  <table>
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
    </tbody>
  </table>
  <p>
    <input type="submit" value="<?php echo __('Save', array(), 'sf_admin') ?>" />
  </p>
  <p>&nbsp;</p>
</form>
</div>
