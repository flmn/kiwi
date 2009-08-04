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
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
  }
}
