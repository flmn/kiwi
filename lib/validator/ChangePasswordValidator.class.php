<?php

class ChangePasswordValidator extends sfValidatorBase {
  public function configure($options = array(), $messages = array()) {
    $this->addOption('password_old_field', 'password_old');
    $this->addOption('password_new_field', 'password_new');
    $this->addOption('password_again_field', 'password_again');
    $this->addMessage('old_invalid', 'The old password is invalid.');
    $this->addMessage('new_invalid', 'The new password can not be empty.');
    $this->addMessage('unequal', 'New password and re-typed password must be equal.');
  }

  protected function doClean($values) {
    if (!isset($values[$this->getOption('password_old_field')])
        || !isset($values[$this->getOption('password_new_field')])
        || !isset($values[$this->getOption('password_again_field')])) {
      return $values;
    }
    
    $password_old = $values[$this->getOption('password_old_field')];
    $password_new = $values[$this->getOption('password_new_field')];
    $password_again = $values[$this->getOption('password_again_field')];

    $user = sfContext::getInstance()->getUser()->getUserObject();

    if (!$password_old) {
      return $values;
    }

    if (!$user->checkPassword($password_old)) {
      throw new sfValidatorError($this, 'old_invalid');
    }

    if (!$password_new) {
      throw new sfValidatorError($this, 'new_invalid');
    }

    if ($password_new == $password_again) {
      return array_merge($values, array('password' => $password_new));
    } else {
      throw new sfValidatorError($this, 'unequal');
    }

  }
}
