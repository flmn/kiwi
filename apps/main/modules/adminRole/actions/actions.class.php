<?php

/**
 * adminRole actions.
 *
 * @package    kiwi
 * @subpackage adminRole
 * @author     jitao
 * @version
 */
class adminRoleActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
  // sorting
    if ($request->getParameter('sort')) {
      $this->_setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }
    // pager
    if ($request->getParameter('page')) {
      $this->_setPage($request->getParameter('page'));
    }

    $this->pager = $this->_getPager();
    $this->sort = $this->_getSort();
  }

  public function executeFilter(sfWebRequest $request) {
    $this->_setPage(1);

    if ($request->hasParameter('_reset')) {
      $this->_setFilters(array());
      $this->redirect('role');
    }

    $this->filters = new RoleFormFilter($this->_getFilters(), array());
    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid()) {
      $this->_setFilters($this->filters->getValues());
      $this->redirect('role');
    }

    $this->pager = $this->_getPager();
    $this->sort = $this->_getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request) {
    $this->form = new RoleForm();
    $this->role = $this->form->getObject();
    $this->setTemplate('form');
  }

  public function executeCreate(sfWebRequest $request) {
    $this->form = new RoleForm();
    $this->role = $this->form->getObject();

    $this->_processForm($request, $this->form);

    $this->setTemplate('form');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->role = $this->getRoute()->getObject();
    $this->form = new RoleForm($this->role);
    $this->setTemplate('form');
  }

  public function executeUpdate(sfWebRequest $request) {
    $this->role = $this->getRoute()->getObject();
    $this->form = new RoleForm($this->role);

    $this->_processForm($request, $this->form);

    $this->setTemplate('form');
  }

  protected function _processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $success = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      $role = $form->save();
      $this->getUser()->setFlash('success', $success);
      $this->redirect(array('sf_route' => 'role_edit', 'sf_subject' => $role));
    }
  }

  protected function _getFilters() {
    return $this->getUser()->getAttribute('admin.role.filters', array(), 'kiwi');
  }

  protected function _setFilters(array $filters) {
    return $this->getUser()->setAttribute('admin.role.filters', $filters, 'kiwi');
  }

  protected function _getPager() {
    $pager = new sfDoctrinePager('Role', 20);
    $pager->setQuery($this->_buildQuery());
    $pager->setPage($this->_getPage());
    $pager->init();

    return $pager;
  }

  protected function _setPage($page) {
    $this->getUser()->setAttribute('admin.role.page', $page, 'kiwi');
  }

  protected function _getPage() {
    return $this->getUser()->getAttribute('admin.role.page', 1, 'kiwi');
  }

  protected function _buildQuery() {
    if (is_null($this->filters)) {
      $this->filters = new RoleFormFilter($this->_getFilters(), array());
    }
    $this->filters->setTableMethod('');
    $query = $this->filters->buildQuery($this->_getFilters());

    $this->_addSortQuery($query);

    return $query;
  }

  protected function _addSortQuery($query) {
    if (array(null, null) == ($sort = $this->_getSort())) {
      return;
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }

  protected function _getSort() {
    if (!is_null($sort = $this->getUser()->getAttribute('admin.role.sort', null, 'kiwi'))) {
      return $sort;
    }

    $this->_setSort(array(null, null));

    return $this->getUser()->getAttribute('admin.role.sort', null, 'kiwi');
  }

  protected function _setSort(array $sort) {
    if (!is_null($sort[0]) && is_null($sort[1])) {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('admin.role.sort', $sort, 'kiwi');
  }
}
