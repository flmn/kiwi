<?php

/**
 * milestone actions.
 *
 * @package    kiwi
 * @subpackage milestone
 * @author     jitao
 * @version    
 */
class milestoneActions extends sfActions {
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
