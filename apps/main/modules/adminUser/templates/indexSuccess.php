<?php slot('sidebar') ?>
<?php include_partial('admin/sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Users') ?></h3>
  <hr/>
  <?php if ($filters->hasGlobalErrors()): ?>
    <?php echo $filters->renderGlobalErrors() ?>
  <?php endif; ?>
  <form action="<?php echo url_for('user_collection', array('action' => 'filter')) ?>" method="post">
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
            <?php echo link_to(__('Reset', array(), 'sf_admin'), 'user_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
            <input type="submit" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
          </td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td>
            <?php echo $filters['display_name']->renderLabel()  ?>
          </td>
          <td>
            <?php echo $filters['display_name']->render() ?>
          </td>
          <td>
            <?php echo $filters['is_active']->renderLabel()  ?>
          </td>
          <td>
            <?php echo $filters['is_active']->render() ?>
          </td>
        </tr>
        <tr>
          <td>
            <?php echo $filters['email']->renderLabel()  ?>
          </td>
          <td>
            <?php echo $filters['email']->render() ?>
          </td>
          <td>
            <?php echo $filters['is_admin']->renderLabel()  ?>
          </td>
          <td>
            <?php echo $filters['is_admin']->render() ?>
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
              'column' => 'display_name',
              'title'  => 'Display name',
              'route'  => 'user',
              )) ?>
        </th>
        <th>
          <?php include_partial('common/list_title', array(
              'sort'   => $sort,
              'column' => 'email',
              'title'  => 'Email',
              'route'  => 'user',
              )) ?>
        </th>
        <th>
          <?php include_partial('common/list_title', array(
              'sort'   => $sort,
              'column' => 'is_active',
              'title'  => 'Active',
              'route'  => 'user',
              )) ?>
        </th>
        <th>
          <?php include_partial('common/list_title', array(
              'sort'   => $sort,
              'column' => 'is_admin',
              'title'  => 'Admin',
              'route'  => 'user',
              )) ?>
        </th>
        <th>
          <?php include_partial('common/list_title', array(
              'sort'   => $sort,
              'column' => 'last_login_at',
              'title'  => 'Last login',
              'route'  => 'user',
              )) ?>
        </th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan="5">
          <?php include_partial('common/pagination', array(
              'pager' => $pager,
              'route' => 'user',
              )) ?>
        </th>
      </tr>
    </tfoot>
    <tbody>
      <?php foreach ($pager->getResults() as $i => $user): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td>
            <?php echo link_to($user->getDisplayName(), 'user_edit', $user) ?>
        </td>
        <td><?php echo $user->getEmail() ?></td>
        <td><?php echo $user->getIsActive() ?></td>
        <td><?php echo $user->getIsAdmin() ?></td>
        <td><?php echo $user->getLastLoginAt() ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
