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
   * Executes members action
   *
   * @param sfRequest $request A request object
   */
  public function executeMembers(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->forward404Unless($this->project);

    $this->form = new ProjectUserRoleForm();
    if ($request->isMethod('post')) {
      $parameters = array_merge($request->getParameter($this->form->getName()), array('project_id' => $this->project->getId()));
      $this->form->bind($parameters, $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $this->form->save();
        $this->getUser()->setFlash('success', 'The item was created successfully.', false);
      }
    }

    $this->members = Doctrine_Query::create()->from('ProjectUserRole pur')->where('pur.project_id = ?', $this->project['id'])->execute(array(), Doctrine::HYDRATE_RECORD);
  }

  /**
   * Executes memberDelete action
   *
   * @param sfRequest $request A request object
   */
  public function executeMemberDelete(sfWebRequest $request) {
  }
}
