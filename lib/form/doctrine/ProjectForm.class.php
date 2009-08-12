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

  protected function doSave($con = null) {
    parent::doSave($con);

    $this->saveRootComponent($con);
  }

  public function saveRootComponent($con = null) {
    if (!$this->isValid()) {
      throw $this->getErrorSchema();
    }

    $root = new Component();
    $root['project_id'] = $this->object['id'];
    $root['name'] = 'root';
    $root['root_id'] = $this->object['id'];
    $root->save();
    Doctrine::getTable('Component')->getTree()->createRoot($root);
  }
}
