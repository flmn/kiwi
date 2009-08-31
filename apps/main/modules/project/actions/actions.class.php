<?php

/**
 * project actions.
 *
 * @package    kiwi
 * @subpackage project
 * @author     jitao
 * @version
 */
class projectActions extends sfActions {
/**
 * Executes home action
 *
 * @param sfRequest $request A request object
 */
  public function executeHome(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
  }
}
