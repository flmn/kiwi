<div>
  <ul class="sidebar-list">
    <li><?php echo link_to(__('Milestones'), 'milestone', array('project_id' => $project['identifier'])) ?></li>
    <?php if ($sf_user->hasPermission($project['identifier'], 'milestone_add')): ?>
    <li><?php echo link_to(__('New Milestone'), 'milestone_new', array('project_id' => $project['identifier'])) ?></li>
    <?php endif; ?>
  </ul>
</div>