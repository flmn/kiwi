<?php

/**
 * Project filter form.
 *
 * @package    filters
 * @subpackage Project *
 * @version    
 */
class ProjectFormFilter extends BaseProjectFormFilter
{
  public function configure()
  {
    $this->widgetSchema['name']->setOption('template', '%input%');
  }
}