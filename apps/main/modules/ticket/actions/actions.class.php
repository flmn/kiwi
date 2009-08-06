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
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    // pager
    if ($request->getParameter('page')) {
      $this->_setPage($request->getParameter('page'));
    }

    $this->pager = $this->_getPager();
  }

  public function executeShow(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->ticket = Doctrine::getTable('Ticket')->find($request->getParameter('id'));
    $this->form = new TicketForm($this->project, $this->ticket);
  }

  /**
   * Executes new action
   *
   * @param sfRequest $request A request object
   */
  public function executeNew(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->form = new TicketForm($this->project);
    if ($request->isMethod('post')) {
      $this->_processForm($request, $this->form);
    }
  }

  protected function _processForm(sfWebRequest $request, sfForm $form) {
    $extras = array(
        'project_id' => $this->project->getId(),
        'author_id' => $this->getUser()->getUserObject()->getId(),
    );
    $parameters = array_merge($request->getParameter($form->getName()), $extras);
    $form->bind($parameters, $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $success = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      $ticket = $form->save();
      $this->getUser()->setFlash('success', $success);
      $this->redirect(array('sf_route' => 'ticket_show', 'project_id' => $this->project['identifier'], 'id' => $ticket['id']));
    }
  }

  protected function _getPager() {
    $pager = new sfDoctrinePager('Ticket', 20);
    $pager->setQuery($this->_buildQuery());
    $pager->setPage($this->_getPage());
    $pager->init();

    return $pager;
  }

  protected function _setPage($page) {
    $this->getUser()->setAttribute('ticket.page', $page, 'kiwi');
  }

  protected function _getPage() {
    return $this->getUser()->getAttribute('ticket.page', 1, 'kiwi');
  }

  protected function _buildQuery() {
    $query = Doctrine_Query::create()->from('Ticket t');

    return $query;
  }
}
