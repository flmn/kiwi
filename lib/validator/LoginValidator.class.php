<?php

class LoginValidator extends sfValidatorBase {
  public function configure($options = array(), $messages = array()) {
    $this->addOption('email_field', 'email');
    $this->addOption('password_field', 'password');
    $this->setMessage('invalid', 'The email and/or password is invalid.');
  }

  protected function doClean($values) {
    $email = isset($values[$this->getOption('email_field')]) ? $values[$this->getOption('email_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';

    if ($email && $user = UserTable::retrieveByEmail($email)) {
      if ($user->getIsActive() && $user->checkPassword($password)) {
        return array_merge($values, array('user' => $user));
      }
    }

    throw new sfValidatorError($this, 'invalid');
  }
}
