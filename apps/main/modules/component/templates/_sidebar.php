<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('Components'), 'component', array('project_id' => $project->getIdentifier())) ?></li>
    <li><?php echo link_to(__('New Component'), 'component_new', array('project_id' => $project->getIdentifier())) ?></li>
  </ul>
</div>