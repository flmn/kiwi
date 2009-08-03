<div id="navigation" class="ui-tabs ui-widget">
  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header">
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'project'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Home'), 'project_home', $project) ?>
    </li>
    <li class="ui-state-default <?php if ($sf_request->getParameter('module') == 'ticket'):echo 'ui-tabs-selected ui-state-active'; endif?>">
      <?php echo link_to(__('Tickets'), 'ticket', array('project_id' => $project->getIdentifier())) ?>
    </li>
  </ul>
</div>
