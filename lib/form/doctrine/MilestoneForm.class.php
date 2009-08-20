<?php

/**
 * Milestone form.
 *
 * @package    form
 * @subpackage Milestone
 * @version
 */
class MilestoneForm extends BaseMilestoneForm {
  public function configure() {
    $this->widgetSchema['due_date']->setOption('format', '%year%-%month%-%day%');
    
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
  }
}