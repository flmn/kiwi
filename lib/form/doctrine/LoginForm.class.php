<?php

class LoginForm extends BaseForm {
  public function configure() {
    $this->setWidgets(array(
        'email'    => new sfWidgetFormInputText(),
        'password' => new sfWidgetFormInputPassword(),
        //'captcha'  => new sfWidgetCaptchaGD(),
    ));

    $this->setValidators(array(
        'email'    => new sfValidatorEmail(),
        'password' => new sfValidatorString(),
        //'captcha'  => new sfCaptchaGDValidator(),
    ));

    $this->validatorSchema->setPostValidator(new LoginValidator());

    $this->widgetSchema->setNameFormat('login[%s]');
  }
}
