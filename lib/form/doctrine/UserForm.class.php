<?php

/**
 * User form.
 *
 * @package    form
 * @subpackage User
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class UserForm extends BaseUserForm {
  public function configure() {
    unset(
        $this['last_login_at']
    );

    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    if (!$this->getObject()->isNew()) {
      $this->validatorSchema['password']->setOption('required', false);
    }
    $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
    $this->widgetSchema->moveField('password_again', 'after', 'password');

    $this->widgetSchema['language'] = new sfWidgetFormChoice(array('choices' => sfConfig::get('sf_cultures')));
    $this->widgetSchema['theme'] = new sfWidgetFormChoice(array('choices' => sfConfig::get('sf_themes')));

    $this->mergePostValidator(new sfValidatorSchemaCompare('password_again', sfValidatorSchemaCompare::EQUAL, 'password', array(), array('invalid' => 'The two passwords must be the same.')));

    $this->widgetSchema->setHelps(array(
        'email'        => '255 characters maximum.',
        'display_name' => 'Length between 1 and 16 characters.',
    ));
  }
}