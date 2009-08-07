<?php

/**
 * Project form base class.
 *
 * @package    form
 * @version
 */
abstract class BaseFormDoctrine extends sfFormDoctrine {
  public function setup() {
    unset(
        $this['created_at'],
        $this['updated_at']
    );
  }
}