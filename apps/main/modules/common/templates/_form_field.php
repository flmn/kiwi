<tr>
  <td class="key"><?php echo $form[$name]->renderLabel() ?></td>
  <td><?php echo $form[$name]->render($attributes) ?></td>
  <td><?php if ($form[$name]->hasError()): echo $form[$name]->renderError(); endif; ?></td>
</tr>
