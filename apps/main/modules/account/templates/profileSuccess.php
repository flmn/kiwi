<?php slot('sidebar') ?>
<?php include_partial('sidebar') ?>
<?php end_slot() ?>

<div>
  <h3><?php echo __('Profile') ?></h3>
  <hr/>
  <table class="data">
    <thead>
      <tr>
        <th colspan="2"><?php echo __('Basic') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="key"><?php echo __('Email') ?></th>
        <td><?php echo $user['email'] ?></td>
      </tr>
      <tr>
        <th class="key"><?php echo __('Display name') ?></th>
        <td><?php echo $user['display_name'] ?></td>
      </tr>
      <tr>
        <th class="key"><?php echo __('Language') ?></th>
        <td><?php echo $cultures[$user['language']]; ?></td>
      </tr>
      <tr>
        <th class="key"><?php echo __('Theme') ?></th>
        <td><?php echo $themes[$user['theme']]; ?></td>
      </tr>
    </tbody>
  </table>
</div>
