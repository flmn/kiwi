<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<?php foreach ($pager->getResults() as $i => $milestone): ?>
<table>
  <tbody>
    <tr>
      <td><?php echo link_to($milestone->getName(), 'milestone_edit', array('project_id' => $project->getIdentifier(), 'id' => $milestone->getId())) ?></td>
    </tr>
    <tr>
      <td>
          <?php echo $milestone->getDue() ?>
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
