<?php slot('sidebar') ?>
<?php include_partial('admin/sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Projects') ?></h3>
  <hr/>
  <?php if ($filters->hasGlobalErrors()): ?>
    <?php echo $filters->renderGlobalErrors() ?>
  <?php endif; ?>
  <form action="<?php echo url_for('project_collection', array('action' => 'filter')) ?>" method="post">
    <table cellspacing="0" class="form">
      <thead>
        <tr>
          <th colspan="4"><?php echo __('Filter') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="4">
            <?php echo $filters->renderHiddenFields() ?>
            <?php echo link_to(__('Reset', array(), 'sf_admin'), 'project_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
            <input type="submit" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
          </td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td>
            <?php echo $filters['name']->renderLabel()  ?>
          </td>
          <td>
            <?php echo $filters['name']->render() ?>
          </td>
          <td>
            <?php echo $filters['project_status']->renderLabel()  ?>
          </td>
          <td>
            <?php echo $filters['project_status']->render() ?>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <table>
    <thead>
      <tr>
        <th>
          <?php include_partial('common/list_title', array(
              'sort'   => $sort,
              'column' => 'name',
              'title'  => 'Project name',
              'route'  => 'project',
              )) ?>
        </th>
        <th>
          <?php include_partial('common/list_title', array(
              'sort'   => $sort,
              'column' => 'project_status',
              'title'  => 'Project status',
              'route'  => 'project',
              )) ?>
        </th>
        <th><?php echo __('Actions') ?></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan="3">
          <?php include_partial('common/pagination', array(
              'pager' => $pager,
              'route' => 'project',
              )) ?>
        </th>
      </tr>
    </tfoot>
    <tbody>
      <?php foreach ($pager->getResults() as $i => $project): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td>
            <?php echo link_to($project['name'], 'project_edit', $project) ?>
        </td>
        <td><?php echo $project['project_status'] ?></td>
        <td>
            <?php echo link_to(__('Home'), 'project_home', $project) ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
