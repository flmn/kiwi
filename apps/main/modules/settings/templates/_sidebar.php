<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('Information'), 'settings', array('project_id' => $project['identifier'])) ?></li>
    <li><?php echo link_to(__('Members'), 'settings_members', array('project_id' => $project['identifier'])) ?></li>
  </ul>
</div>