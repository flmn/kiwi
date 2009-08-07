<?php

/**
 * Ticket form.
 *
 * @package    form
 * @subpackage Ticket
 * @version
 */
class TicketForm extends BaseTicketForm {

  protected $project = null;

  public function __construct($project, $object = null, $options = array(), $CSRFSecret = null) {
    $this->project = $project;
    parent::__construct($object, $options, $CSRFSecret);
  }

  public function configure() {
    unset(
        $this['ticket_number']
    );

    $this->widgetSchema['component_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'    => 'Component',
        'order_by' => array('lft', ''),
        'query'    => Doctrine_Query::create()->from('Component c')->where('c.root_id = ?', $this->project['id']),
        'method'   => 'getIndentedName',
    ));

    $this->widgetSchema['milestone_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'    => 'Milestone',
        'add_empty' => true,
        'query'    => Doctrine_Query::create()->from('Milestone m')->where('m.project_id = ?', $this->project['id']),
    ));

    $this->setDefaults(array(
        'type_id'     => Doctrine::getTable('TicketType')->findOneByIsDefault(true)->getId(),
        'priority_id' => Doctrine::getTable('TicketPriority')->findOneByIsDefault(true)->getId(),
        'status_id'   => Doctrine::getTable('TicketStatus')->findOneByIsDefault(true)->getId(),
    ));

    $this->widgetSchema->setLabels(array(
        'component_id' => 'Component',
        'milestone_id' => 'Milestone',
        'type_id'      => 'Type',
        'priority_id'  => 'Priority',
        'status_id'    => 'Status',
    ));
  }

  protected function doSave($conn = null) {
    if ($this->object->isNew()) {
      $conn->beginTransaction();
      $this->project['tickets_count'] = $this->project['tickets_count'] + 1;
      $this->project->save();
      $this->object['ticket_number'] = $this->project['tickets_count'];
      parent::doSave($conn);
      $conn->commit();
    } else {
      parent::doSave($conn);
    }
  }
}