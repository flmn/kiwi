<?php slot('navigation') ?>
<?php include_partial('project/navigation', array('project' => $project)) ?>
<?php end_slot() ?>
<?php slot('sidebar') ?>
<?php include_partial('sidebar', array('project' => $project)) ?>
<?php end_slot() ?>

<table id="tree-table" class="data">
  <thead>
    <tr>
      <th width="1px">&nbsp;</th>
      <th><?php echo __('Name') ?></th>
      <th><?php echo __('Actions') ?></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th colspan="3"><?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $components->count()), $components->count()) ?></th>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($components as $i => $component): ?>
      <?php
      $node = $component->getNode();
      $childClass = '';
      if ($node->isValidNode() && $node->hasParent()) {
        $childClass = " child-of-node-".$node->getParent()->getId();
      }
      ?>
    <tr id="node-<?php echo $component['id'] ?>" class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?><?php echo $childClass ?>">
      <td>&nbsp;</td>
      <td>
          <?php echo $component['name'] ?>
      </td>
      <td>
          <?php if (!$node->isRoot()): ?>
            <?php echo link_to(_('Edit'), 'component_edit', array('project_id' => $project['identifier'], 'id' => $component['id'])) ?>
          <?php else: ?>
            <?php echo '&nbsp;' ?>
          <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script type="text/javascript">
  /* <![CDATA[ */
  $(document).ready(function()  {
    $("#tree-table").treeTable({
      clickableNodeNames: true,
      indent: 15,
      initialState: "expanded",
      treeColumn: 1
    });
  });
  /* ]]> */
</script>
