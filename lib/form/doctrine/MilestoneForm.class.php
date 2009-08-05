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
    unset(
        $this['created_at'],
        $this['updated_at']
    );

    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
  }
}