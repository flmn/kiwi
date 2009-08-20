<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Members') ?></h3>
  <hr/>
  <?php include_partial('common/flashes') ?>
  <table class="data">
    <thead>
      <tr>
        <th>User</th>
        <th>Role</th>
        <th><?php echo __('Actions') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($members as $i => $member): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td>
            <?php echo $member['user'] ?>
        </td>
        <td><?php echo $member['role'] ?></td>
        <td>
            <?php echo link_to('Remove', 'settings_member_delete', array('project_id' => $project['identifier'], 'id' => $member['id']), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <hr/>
  <form action="#" method="post">
    <?php echo $form->renderHiddenFields() ?>
    <?php include_partial('common/form_errors', array('form' => $form)) ?>
    <table class="form">
      <thead>
        <tr>
          <th colspan="3"><?php echo __('Add member') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'user_id',
            'attributes' => array(),
            )) ?>
        <?php include_partial('common/form_field', array(
            'form'       => $form,
            'name'       => 'role_id',
            'attributes' => array(),
            )) ?>
      </tbody>
    </table>
    <p>
      <input type="submit" value="<?php echo __('Add', array(), 'sf_admin') ?>" />
    </p>
    <p>&nbsp;</p>
  </form>
</div>
