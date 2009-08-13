<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Members') ?></h3>
  <hr/>
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
            <?php echo 'Remove' ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
