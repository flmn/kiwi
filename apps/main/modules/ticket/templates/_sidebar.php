<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('Tickets'), 'ticket', array('project_id' => $project->getIdentifier())) ?></li>
    <li><?php echo link_to(__('New Ticket'), 'ticket_new', array('project_id' => $project->getIdentifier())) ?></li>
  </ul>
</div>