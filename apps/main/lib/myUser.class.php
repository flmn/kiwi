<?php

class myUser extends sfBasicSecurityUser
{
  private $user = null;

  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    // initialize parent
    parent::initialize($dispatcher, $storage, $options);

    $this->setAttribute('theme', $this->getAttribute('theme', sfConfig::get('sf_default_theme'), 'kiwi'), 'kiwi');
  }

  protected function _setAttributes($user) {
    $this->setAttribute('display_name', $user->getDisplayName(), 'kiwi');
    $this->setAttribute('theme', $user->getTheme(), 'kiwi');
    $this->setCulture($user->getLanguage());
  }

  public function login($user) {
    $user->setLastLoginAt(date('Y-m-d H:i:s'));
    $user->save();
    $this->setAttribute('user_id', $user->getId(), 'kiwi');
    $this->_setAttributes($user);
    $this->setAuthenticated(true);
    $this->clearCredentials();
  }

  public function logout() {
    $this->getAttributeHolder()->removeNamespace('kiwi');
    $this->getAttributeHolder()->removeNamespace('kiwi.admin');
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
