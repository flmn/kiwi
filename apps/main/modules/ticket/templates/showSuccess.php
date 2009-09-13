<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<div>
  <ul class="sidebar-list">
    <li>blah</li>
  </ul>
</div>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Ticket').': #'.$ticket['ticket_number'] ?></h3>
  <hr/>
  <div id="ticket">
    <h4><span style="background-color: <?php echo $ticket['type']['color'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <?php echo $ticket['type'].': '.$ticket['subject'] ?></h4>
    <table class="properties">
      <tbody>
        <tr>
          <th>
            <?php echo __('Reported by') ?>
          </th>
          <td>
            <?php echo $ticket['author'] ?>
          </td>
          <th>
            <?php echo __('Owned by') ?>
          </th>
          <td>
            <?php echo $ticket['assigned_to'] ?>
          </td>
        </tr>
        <tr>
          <th>
            <?php echo __('Priority') ?>
          </th>
          <td>
            <?php echo $ticket['priority'] ?>
          </td>
          <th>
            <?php echo __('Component') ?>
          </th>
          <td>
            <?php echo $ticket['component'] ?>
          </td>
        </tr>
        <tr>
          <th>
            <?php echo __('Start Date') ?>
          </th>
          <td>
            <?php echo $ticket['start_date'] ?>
          </td>
          <th>
            <?php echo __('Due date') ?>
          </th>
          <td>
            <?php echo $ticket['due_date'] ?>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="description">
      <h5><?php echo __('Description') ?></h5>
      <div>
        <?php echo $ticket['description'] ?>
      </div>
    </div>
  </div>
</div>
