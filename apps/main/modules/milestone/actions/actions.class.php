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
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->forward404Unless($this->project);
    // pager
    if ($request->getParameter('page')) {
      $this->_setPage($request->getParameter('page'));
    }

    $this->pager = $this->_getPager();
  }

  /**
   * Executes new action
   *
   * @param sfRequest $request A request object
   */
  public function executeNew(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->forward404Unless($this->project);
    $this->form = new MilestoneForm();

    if ($request->isMethod('post')) {
      $this->_processForm($request, $this->form);
    }

    $this->setTemplate('form');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->forward404Unless($this->project);
    $this->milestone = Doctrine::getTable('Milestone')->find($request->getParameter('id'));
    $this->form = new MilestoneForm($this->milestone);

    if ($request->isMethod('post')) {
      $this->_processForm($request, $this->form);
    }

    $this->setTemplate('form');
  }

  protected function _processForm(sfWebRequest $request, sfForm $form) {
    $parameters = array_merge($request->getParameter($form->getName()), array('project_id' => $this->project['id']));
    $form->bind($parameters, $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $success = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      $milestone = $form->save();
      $this->getUser()->setFlash('success', $success);
      $this->redirect(array('sf_route' => 'milestone_edit', 'project_id' => $this->project['identifier'], 'id' => $milestone['id']));
    }
  }

  protected function _getFilters() {
    return $this->getUser()->getAttribute('milestone.filters', array(), 'kiwi');
  }

  protected function _setFilters(array $filters) {
    return $this->getUser()->setAttribute('milestone.filters', $filters, 'kiwi');
  }

  protected function _getPager() {
    $pager = new sfDoctrinePager('Milestone', 20);
    $pager->setQuery($this->_buildQuery());
    $pager->setPage($this->_getPage());
    $pager->init();

    return $pager;
  }

  protected function _setPage($page) {
    $this->getUser()->setAttribute('milestone.page', $page, 'kiwi');
  }

  protected function _getPage() {
    return $this->getUser()->getAttribute('milestone.page', 1, 'kiwi');
  }

  protected function _buildQuery() {
    if (is_null($this->filters)) {
      $this->filters = new MilestoneFormFilter($this->_getFilters(), array());
    }
    $this->filters->setTableMethod('');
    $values = array_merge($this->_getFilters(), array('project_id' => $this->project['id']));
    $query = $this->filters->buildQuery($values);

    return $query;
  }
}
