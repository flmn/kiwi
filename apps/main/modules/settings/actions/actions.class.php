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
    $this->forward404Unless($this->project);
  }

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeMembers(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->forward404Unless($this->project);

    $this->members = Doctrine_Query::create()->from('ProjectUserRole pur')->where('pur.project_id = ?', $this->project['id'])->execute(array(), Doctrine::HYDRATE_RECORD);
  }
}
