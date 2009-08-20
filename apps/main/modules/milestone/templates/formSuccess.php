<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <?php if ($form->isNew()): ?>
  <h3><?php echo __('New Milestone') ?></h3>
  <?php else: ?>
  <h3><?php echo __('Edit Milestone').': '.$milestone['name'] ?></h3>
  <?php endif; ?>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <form action="#" method="post">
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
            'name'       => 'due_date',
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
