<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __($project['name']) ?></h3>
  <hr/>
  <table class="data">
    <tbody>
      <tr>
        <th class="key"><?php echo __('Identifier') ?></th>
        <td><?php echo $project['identifier'] ?></td>
      </tr>
      <tr>
        <th class="key"><?php echo __('Status') ?></th>
        <td><?php echo $project['project_status'] ?></td>
      </tr>
    </tbody>
  </table>
</div>
