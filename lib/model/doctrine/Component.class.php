<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Component extends BaseComponent {
  public function getParentId() {
    if (!$this->getNode()->isValidNode() || $this->getNode()->isRoot()) {
      return null;
    }
    $parent = $this->getNode()->getParent();
    return $parent['id'];
  }
  
  public function getIndentedName() {
    return str_repeat('- ',$this['level']).$this['name'];
  }
}