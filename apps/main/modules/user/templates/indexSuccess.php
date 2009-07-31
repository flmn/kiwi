<?php slot('sidebar') ?>
<?php include_partial('admin/sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Users') ?></h3>
  <hr/>
  <table>
    <thead>
      <tr>
        <th><?php echo __('Display name') ?></th>
        <th><?php echo __('Email') ?></th>
        <th><?php echo __('Active') ?></th>
        <th><?php echo __('Admin') ?></th>
        <th><?php echo __('Last login') ?></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan="5">
          <?php if ($pager->haveToPaginate()): ?>
          <a href="<?php echo url_for('@user') ?>?page=1">
              <?php echo image_tag($sf_user->getThemeImage('first.png'), array('alt' => __('First page', array(), 'sf_admin'), 'title' => __('First page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;</span>
          <a href="<?php echo url_for('@user') ?>?page=<?php echo $pager->getPreviousPage() ?>">
              <?php echo image_tag($sf_user->getThemeImage('previous.png'), array('alt' => __('Previous page', array(), 'sf_admin'), 'title' => __('Previous page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;</span>
            <?php foreach ($pager->getLinks() as $page): ?>
              <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
              <?php else: ?>
          <a href="<?php echo url_for('@user') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
              <?php endif; ?>
          <span>&nbsp;</span>
            <?php endforeach; ?>
          <a href="<?php echo url_for('@user') ?>?page=<?php echo $pager->getNextPage() ?>">
              <?php echo image_tag($sf_user->getThemeImage('next.png'), array('alt' => __('Next page', array(), 'sf_admin'), 'title' => __('Next page', array(), 'sf_admin'))) ?>
          </a>
          <span>&nbsp;</span>
          <a href="<?php echo url_for('@user') ?>?page=<?php echo $pager->getLastPage() ?>">
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
