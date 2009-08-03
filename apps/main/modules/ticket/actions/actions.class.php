<?php

/**
 * ticket actions.
 *
 * @package    kiwi
 * @subpackage ticket
 * @author     jitao
 * @version
 */
class ticketActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
    $project_id = $request->getParameter('project_id');
    $this->project = Doctrine::getTable('Project')->retrieveByIdentifier($project_id);
  }

  /**
   * Executes new action
   *
   * @param sfRequest $request A request object
   */
  public function executeNew(sfWebRequest $request) {
    $project_id = $request->getParameter('project_id');
    $this->project = Doctrine::getTable('Project')->retrieveByIdentifier($project_id);
    $this->form = new TicketForm();
    if ($request->isMethod('post')) {
      $this->_processForm($request, $this->form);
    }
    $this->setTemplate('form');
  }

  protected function _processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
       $ticket = $form->save();
    }
    //$this->ticket->setProjectId($request->getParameter('project_id'));
  }
}
