<?php

/**
 * settings actions.
 *
 * @package    kiwi
 * @subpackage settings
 * @author     jitao
 * @version    
 */
class settingsActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
  }
}
