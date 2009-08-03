<?php

/**
 * Project form.
 *
 * @package    form
 * @subpackage Project
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ProjectForm extends BaseProjectForm {
  public function configure() {
    unset(
        $this['created_at'],
        $this['updated_at']
    );
    
    $this->widgetSchema->setHelps(array(
        'identifier'  => 'Length between 1 and 32 characters. Only lower case letters (a-z), numbers and dashes are allowed. Once saved, the identifier can not be changed.',
        'name'        => 'Length between 1 and 128 characters.',
        'description' => '255 characters maximum.',
    ));
  }
}