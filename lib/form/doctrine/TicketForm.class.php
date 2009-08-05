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
        $this['created_at'],
        $this['updated_at']
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

    $this->widgetSchema->setLabels(array(
        'component_id' => 'Component',
        'milestone_id' => 'Milestone',
    ));
  }
}