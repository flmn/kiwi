<?php

class ProfileForm extends BaseFormDoctrine {
  public function configure() {
    $this->setWidgets(array(
        'display_name'   => new sfWidgetFormInput(),
        'language'       => new sfWidgetFormChoice(array('choices' => sfConfig::get('sf_cultures'))),
        'theme'          => new sfWidgetFormChoice(array('choices' => sfConfig::get('sf_themes'))),
        'password_old'   => new sfWidgetFormInputPassword(),
        'password_new'   => new sfWidgetFormInputPassword(),
        'password_again' => new sfWidgetFormInputPassword(),
    ));
    $this->widgetSchema->setLabels(array(
        'password_old'   => 'Old password',
        'password_new'   => 'New password',
        'password_again' => 'Re-type new password',
    ));

    $this->setValidators(array(
        'id'             => new sfValidatorDoctrineChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
        'display_name'   => new sfValidatorString(array('max_length' => 16)),
        'language'       => new sfValidatorString(array('max_length' => 5)),
        'theme'          => new sfValidatorString(array('max_length' => 32)),
        'password_old'   => new sfValidatorString(array('required' => false)),
        'password_new'   => new sfValidatorString(array('required' => false, 'max_length' => 32)),
        'password_again' => new sfValidatorString(array('required' => false, 'max_length' => 32)),
    ));

    $unique = new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('display_name')));
    $password = new ChangePasswordValidator();

    $this->validatorSchema->setPostValidator(new sfValidatorAnd(array($unique, $password)));

    $this->widgetSchema->setNameFormat('profile[%s]');
  }

  public function getModelName()
  {
    return 'User';
  }
}
