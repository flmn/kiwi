<div>
  <h3><?php echo __('My Projects') ?></h3>
  <hr/>
  <table class="data">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($projects as $i => $pur): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td><?php echo link_to($pur['project'], 'project_home', $pur['project']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
