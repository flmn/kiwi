<?php

/**
 * Component form.
 *
 * @package    form
 * @subpackage Component
 * @version
 */
class ComponentForm extends BaseComponentForm {

  protected $parentId = null;
  protected $project = null;

  public function __construct($project, $object = null, $options = array(), $CSRFSecret = null) {
    $this->project = $project;
    parent::__construct($object, $options, $CSRFSecret);
  }

  public function configure() {
    unset(
        $this['root_id'],
        $this['lft'],
        $this['rgt'],
        $this['level']
    );

    $this->widgetSchema['parent_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'    => 'Component',
        'order_by' => array('lft', ''),
        'query'    => Doctrine_Query::create()->from('Component c')->where('c.root_id = ?', $this->project['id']),
        'method'   => 'getIndentedName',
    ));

    $this->validatorSchema['parent_id'] = new sfValidatorDoctrineChoice(array(
        'model' => 'Component',
    ));

    $this->setDefault('parent_id', $this->object->getParentId());
    $this->widgetSchema->setLabels(array(
        'parent_id' => 'Child of',
    ));
  }

  public function updateParentIdColumn($parentId) {
    $this->parentId = $parentId;
  }

  protected function doSave($con = null) {
    parent::doSave($con);
    $node = $this->object->getNode();
    $parent = $this->object->getTable()->find($this->parentId);
    $method = ($node->isValidNode() ? 'move' : 'insert') . 'AsLastChildOf';
    $node->$method($parent);
  }
}