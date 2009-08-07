<?php

/**
 * Role filter form.
 *
 * @package    filters
 * @subpackage Role *
 * @version    
 */
class RoleFormFilter extends BaseRoleFormFilter {
  public function configure() {
    $this->widgetSchema['name']->setOption('template', '%input%');
  }
}