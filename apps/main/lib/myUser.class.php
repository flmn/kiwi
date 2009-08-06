<?php

class myUser extends sfBasicSecurityUser {
  private $user = null;

  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array()) {
  // initialize parent
    parent::initialize($dispatcher, $storage, $options);

    if (!$this->isAuthenticated()) {
      $this->getAttributeHolder()->removeNamespace('kiwi');
      $this->user = null;
    }

    $this->setAttribute('theme', $this->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi'), 'kiwi');
  }

  public function hasCredential($credential, $useAnd = true) {
    if (empty($credential)) {
      return true;
    }

    if (!$this->getUserObject()) {
      return false;
    }
    
    if ($credential == 'site_admin') {
      if ($this->getUserObject()->getIsAdmin()) {
        return true;
      } else {
        return false;
      }
    }

    return parent::hasCredential($credential, $useAnd);
  }

  protected function _setAttributes($user) {
    $this->setAttribute('display_name', $user['display_name'], 'kiwi');
    $this->setAttribute('theme', $user['theme'], 'kiwi');
    $this->setCulture($user['language']);
  }

  public function login($user) {
    $user->setLastLoginAt(date('Y-m-d H:i:s'));
    $user->save();
    $this->setAttribute('user_id', $user['id'], 'kiwi');
    $this->_setAttributes($user);
    $this->setAuthenticated(true);
    $this->clearCredentials();
  }

  public function logout() {
    $this->getAttributeHolder()->removeNamespace('kiwi');
    $this->user = null;
    $this->clearCredentials();
    $this->setAuthenticated(false);
    $this->setCulture(sfConfig::get('sf_default_culture'));
  }

  public function getUserObject() {
    if (!$this->user && $id = $this->getAttribute('user_id', null, 'kiwi')) {
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

  public function getThemeImage($img) {
    $theme = $this->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi');
    return '/themes/'.$theme.'/images/'.$img;
  }
}
