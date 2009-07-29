<?php
class sfWidgetCaptchaGD extends sfWidgetFormInput {
  protected function configure($options = array(), $attributes = array()) {
    sfWidgetFormInput::configure($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array()) {
    $url = sfContext::getInstance()->getRouting()->generate("sf_captchagd");
    $img = '<a href="" onclick="return false" title="'.__('Reload image').'"><img id="captcha" src="'.$url.'?'.time().'" onclick="this.src=\''.$url.'?r=\' + Math.random()" /></a>';
    $merged_attributes = array_merge($attributes, array('maxlength' => sfConfig::get('app_sf_captchagd_length', '4')));
    return sfWidgetFormInput::render($name, $value, $merged_attributes, $errors).$img;
  }
}
