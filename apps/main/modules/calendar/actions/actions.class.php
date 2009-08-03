<?php

/**
 * calendar actions.
 *
 * @package    kiwi
 * @subpackage calendar
 * @author     jitao
 * @version    
 */
class calendarActions extends sfActions {
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
