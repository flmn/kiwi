<?php slot('sidebar') ?>
<?php include_partial('sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Profile') ?></h3>
  <hr/>
  <table>
    <thead>
      <tr>
        <th colspan="2"><?php echo __('Basic') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="key"><?php echo __('Email') ?></td>
        <td><?php echo $user->getEmail() ?></td>
      </tr>
      <tr>
        <td class="key"><?php echo __('Display name') ?></td>
        <td><?php echo $user->getDisplayName() ?></td>
      </tr>
      <tr>
        <td class="key"><?php echo __('Language') ?></td>
        <td><?php echo $cultures[$user->getLanguage()]; ?></td>
      </tr>
      <tr>
        <td class="key"><?php echo __('Theme') ?></td>
        <td><?php echo $themes[$user->getTheme()]; ?></td>
      </tr>
    </tbody>
  </table>
</div>
