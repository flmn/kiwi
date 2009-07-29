<?php
class sfCaptchaGDValidator extends sfValidatorString {
/**
 * Configures the current validator.
 *
 * Available options:
 *
 *  * length: The Length of the string
 *
 * Available error codes:
 *
 *  * length
 *
 * @param array $options   An array of options
 * @param array $messages  An array of error messages
 *
 * @see sfValidatorBase
 */

  public function configure($options = array(), $messages = array()) {
    $this->addMessage('length', '"%value%" must be %length% characters long.');

    $this->setOption('empty_value', '');
  }

  protected function doClean($value) {
    $clean = (string) $value;

    $length = function_exists('mb_strlen') ? mb_strlen($clean, $this->getCharset()) : strlen($clean);

    $expected_length = sfConfig::get('app_sf_captchagd_length', 4);
    if ($length != $expected_length) {
      throw new sfValidatorError($this, 'length', array('value' => $value, 'length' => $expected_length));
    }

    if (sfContext::getInstance()->getUser()->getAttribute('captcha', NULL) != $value) {
      throw new sfValidatorError($this, 'invalid', array('value' => $value));
    }

    return $clean;
  }
}
?>
