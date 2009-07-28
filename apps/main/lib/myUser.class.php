<?php

class myUser extends sfBasicSecurityUser
{
  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    // initialize parent
    parent::initialize($dispatcher, $storage, $options);

    $this->setAttribute('kiwi.theme', sfConfig::get('sf_default_theme') );
  }
}
