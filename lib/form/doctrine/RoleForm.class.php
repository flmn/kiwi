<?php

/**
 * Role form.
 *
 * @package    form
 * @subpackage Role
 * @version
 */
class RoleForm extends BaseRoleForm {
  public function configure() {
    $this->validatorSchema['permissions'] = new sfValidatorPass(array('required' => false, 'empty_value' => array()));
  }

  public function updatePermissionsColumn($value) {
    if (empty($value) || !is_array($value)) {
      return '';
    }
    return implode(",", $value);
  }
}