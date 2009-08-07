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
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
  }
}