<?php

class myUser extends sfBasicSecurityUser
{
  private $user = null;

  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    // initialize parent
    parent::initialize($dispatcher, $storage, $options);

    $this->setAttribute('kiwi.theme', $this->getAttribute('kiwi.theme', sfConfig::get('sf_default_theme')));
  }

  protected function _setAttributes($user) {
    $this->setAttribute('kiwi.display_name', $user->getDisplayName());
    $this->setAttribute('kiwi.theme', $user->getTheme());
    $this->setCulture($user->getLanguage());
  }

  public function login($user) {
    $this->setAttribute('kiwi.user_id', $user->getId());
    $this->_setAttributes($user);
    $this->setAuthenticated(true);
    $this->clearCredentials();
  }

  public function logout() {
    $this->clearCredentials();
    $this->setAuthenticated(false);
    $this->setAttribute('kiwi.theme', sfConfig::get('sf_default_theme'));
    $this->setCulture(sfConfig::get('sf_default_culture'));
  }

  public function getUserObject() {
    if (!$this->user && $id = $this->getAttribute('kiwi.user_id', null)) {
      $this->user = Doctrine::getTable('User')->find($id);

      if (!$this->user) {
        $this->signOut();
        throw new sfException('The user does not exist anymore in the database.');
      }
    }

    return $this->user;
  }

  public function updateProfile() {
    $this->user = null;
    $this->_setAttributes($this->getUserObject());
  }
}
