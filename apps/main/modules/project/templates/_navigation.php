<div id="navigation" class="ui-tabs ui-widget">
  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header">
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'project'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Home'), 'project_home', array('project_id' => $project['identifier'])) ?>
    </li>
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'calendar'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Calendar'), 'calendar', array('project_id' => $project['identifier'])) ?>
    </li>
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'component'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Components'), 'component', array('project_id' => $project['identifier'])) ?>
    </li>
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'milestone'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Milestones'), 'milestone', array('project_id' => $project['identifier'])) ?>
    </li>
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'ticket'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Tickets'), 'ticket', array('project_id' => $project['identifier'])) ?>
    </li>
    <?php if ($sf_user->hasPermission($project['identifier'], 'settings_edit')): ?>
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'settings'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Settings'), 'settings', array('project_id' => $project['identifier'])) ?>
    </li>
    <?php endif; ?>
  </ul>
</div>
