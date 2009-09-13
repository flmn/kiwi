<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Tickets') ?></h3>
  <hr/>
  <table class="data">
    <thead>
      <tr>
        <th width="30"><?php echo __('Type') ?></th>
        <th><?php echo __('Ticket') ?></th>
        <th><?php echo __('Subject') ?></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan="2">
          <?php include_partial('common/pagination', array(
              'pager' => $pager,
              'route' => 'ticket',
              )) ?>
        </th>
      </tr>
    </tfoot>
    <tbody>
      <?php foreach ($pager->getResults() as $i => $ticket): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td><span style="background-color: <?php echo $ticket['type']['color'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
        <td>
            <?php echo link_to('#'.$ticket['ticket_number'], 'ticket_show', array('project_id' => $project['identifier'], 'id' => $ticket['id'])) ?>
        </td>
        <td>
            <?php echo link_to($ticket['subject'], 'ticket_show', array('project_id' => $project['identifier'], 'id' => $ticket['id'])) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
