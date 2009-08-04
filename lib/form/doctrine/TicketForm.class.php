<?php

/**
 * Ticket form.
 *
 * @package    form
 * @subpackage Ticket
 * @version
 */
class TicketForm extends BaseTicketForm {
  public function configure() {
    $this->widgetSchema->setLabels(array(
        'component_id' => 'Component',
        'milestone_id' => 'Milestone',
    ));
  }
}