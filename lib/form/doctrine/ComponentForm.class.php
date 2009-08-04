<?php

/**
 * Component form.
 *
 * @package    form
 * @subpackage Component
 * @version
 */
class ComponentForm extends BaseComponentForm {
  public function configure() {
    unset(
        $this['root_id'],
        $this['lft'],
        $this['rgt'],
        $this['level']
    );

    $this->widgetSchema['parent_id'] = new sfWidgetFormDoctrineChoice(array(
        'model' => 'Component',
        'order_by' => array('root_id, lft',''),
        'method' => 'getIndentedName'
    ));
  
    $this->setDefault('parent_id', $this->object->getParentId());
    $this->widgetSchema->setLabels(array(
        'parent_id' => 'Child of',
    ));
  }
}