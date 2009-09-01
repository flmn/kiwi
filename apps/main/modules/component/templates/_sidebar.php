<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('Components'), 'component', array('project_id' => $project['identifier'])) ?></li>
    <?php if ($sf_user->hasPermission($project['identifier'], 'component_add')): ?>
    <li><?php echo link_to(__('New Component'), 'component_new', array('project_id' => $project['identifier'])) ?></li>
    <?php endif; ?>
  </ul>
</div>