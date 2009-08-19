<?php

/**
 * ProjectUserRole form.
 *
 * @package    form
 * @subpackage ProjectUserRole
 * @version
 */
class ProjectUserRoleForm extends BaseProjectUserRoleForm {
  public function configure() {
    $this->widgetSchema['user_id']->setOption('add_empty', true);
    $this->widgetSchema['project_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['role_id']->setOption('add_empty', true);

    $this->widgetSchema->setLabels(array(
        'user_id' => 'User',
        'role_id' => 'Role',
    ));
  }
}