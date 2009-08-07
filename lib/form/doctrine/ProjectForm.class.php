<?php

/**
 * Project form.
 *
 * @package    form
 * @subpackage Project
 * @version
 */
class ProjectForm extends BaseProjectForm {
  public function configure() {
    $this->widgetSchema['identifier'] = new sfWidgetFormInput();
    if (!$this->getObject()->isNew()) {
      $this->widgetSchema['identifier']->setAttribute('disabled', true);
    }

    $this->validatorSchema['identifier'] = new sfValidatorString(array('max_length' => 128));

    $this->widgetSchema->setHelps(array(
        'identifier'  => 'Length between 1 and 32 characters. Only lower case letters (a-z), numbers and dashes are allowed. Once saved, the identifier can not be changed.',
        'name'        => 'Length between 1 and 128 characters.',
        'description' => '255 characters maximum.',
    ));
  }
}