<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('New Ticket'), 'ticket_new', array('project_id' => $project['identifier'])) ?></li>
    <li><?php echo link_to(__('New Component'), 'component_new', array('project_id' => $project['identifier'])) ?></li>
    <li><?php echo link_to(__('New Milestone'), 'milestone_new', array('project_id' => $project['identifier'])) ?></li>
  </ul>
</div>