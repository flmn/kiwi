<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<?php if (!$pager->getNbResults()): ?>
<p><?php echo __('No result', array(), 'sf_admin') ?></p>
<?php else: ?>
  <?php foreach ($pager->getResults() as $i => $milestone): ?>
<table>
  <tbody>
    <tr>
      <td><?php echo link_to($milestone['name'], 'milestone_edit', array('project_id' => $project['identifier'], 'id' => $milestone['id'])) ?></td>
    </tr>
    <tr>
      <td>
            <?php echo $milestone['due_date'] ?>
      </td>
    </tr>
    <tr>
      <td>
        <table class="progress">
          <tbody>
            <tr>
              <td class="closed" style="width: 32%;"><a /></td>
              <td class="open" style="width: 68%;"><a /></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
  <?php endforeach; ?>
<?php endif; ?>
