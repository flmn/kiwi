<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('Tickets'), 'ticket', array('project_id' => $project['identifier'])) ?></li>
    <?php if ($sf_user->hasPermission($project['identifier'], 'ticket_add')): ?>
    <li><?php echo link_to(__('New Ticket'), 'ticket_new', array('project_id' => $project['identifier'])) ?></li>
    <?php endif; ?>
  </ul>
</div>