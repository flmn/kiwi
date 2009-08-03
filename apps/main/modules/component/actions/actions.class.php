<?php

/**
 * component actions.
 *
 * @package    kiwi
 * @subpackage component
 * @author     jitao
 * @version
 */
class componentActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
    $project_id = $request->getParameter('project_id');
    $this->project = Doctrine::getTable('Project')->retrieveByIdentifier($project_id);
  }
}
