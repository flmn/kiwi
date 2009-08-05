<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <?php if ($form->isNew()): ?>
  <h3><?php echo __('New Ticket') ?></h3>
  <?php else: ?>
  <h3><?php echo __('Edit Ticket').': '.$ticket->getSubject() ?></h3>
  <?php endif; ?>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <form action="#" method="post">
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
          'name'       => 'subject',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'component_id',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'milestone_id',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'type_id',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'priority_id',
          'attributes' => array('class' => 'text'),
          )) ?>
      <?php include_partial('common/form_field', array(
          'form'       => $form,
          'name'       => 'status_id',
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
