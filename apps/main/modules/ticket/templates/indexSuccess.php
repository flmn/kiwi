<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Tickets') ?></h3>
  <hr/>
  <table>
    <thead>
      <tr>
        <th>Ticket</th>
        <th>subject</th>
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
