<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<table>
  <thead>
    <tr>
      <th>name</th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th colspan="2">2</th>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($components as $i => $component): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td>
          <?php echo $component['name'] ?>
      </td>
      <td><?php echo link_to('Edit', 'component_edit', array('project_id' => $project['identifier'], 'id' => $component['id'])) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

