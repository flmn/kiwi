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
    <table cellspacing="0">
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
              'title'  => 'Project_name',
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
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan="2">
          <?php if ($pager->haveToPaginate()): ?>
          <a href="<?php echo url_for('@project') ?>?page=1">
              <?php echo image_tag($sf_user->getThemeImage('first.png'), array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;</span>
          <a href="<?php echo url_for('@project') ?>?page=<?php echo $pager->getPreviousPage() ?>">
              <?php echo image_tag($sf_user->getThemeImage('previous.png'), array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;</span>
            <?php foreach ($pager->getLinks() as $page): ?>
              <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
              <?php else: ?>
          <a href="<?php echo url_for('@project') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
              <?php endif; ?>
          <span>&nbsp;</span>
            <?php endforeach; ?>
          <a href="<?php echo url_for('@project') ?>?page=<?php echo $pager->getNextPage() ?>">
              <?php echo image_tag($sf_user->getThemeImage('next.png'), array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;</span>
          <a href="<?php echo url_for('@project') ?>?page=<?php echo $pager->getLastPage() ?>">
              <?php echo image_tag($sf_user->getThemeImage('last.png'), array('alt' => __('Last page', array(), 'sf_admin'), 'title' => __('Last page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <?php endif; ?>
          <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
          <?php if ($pager->haveToPaginate()): ?>
            <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
          <?php endif; ?>
        </th>
      </tr>
    </tfoot>
    <tbody>
      <?php foreach ($pager->getResults() as $i => $project): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td>
            <?php echo link_to($project->getName(), 'project_edit', $project) ?>
        </td>
        <td><?php echo $project->getProjectStatus() ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
