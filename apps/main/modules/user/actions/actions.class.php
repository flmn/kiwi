<?php

/**
 * user actions.
 *
 * @package    kiwi
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class userActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
  // pager
    if ($request->getParameter('page')) {
      $this->_setPage($request->getParameter('page'));
    }

    $this->pager = $this->_getPager();
  }

  public function executeNew(sfWebRequest $request) {
    $this->form = new UserForm();
    $this->user = $this->form->getObject();
    $this->setTemplate('form');
  }

  public function executeCreate(sfWebRequest $request) {
    $this->form = new UserForm();
    $this->user = $this->form->getObject();

    $this->_processForm($request, $this->form);

    $this->setTemplate('form');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->user = $this->getRoute()->getObject();
    $this->form = new UserForm($this->user);
    $this->setTemplate('form');
  }
  
  public function executeUpdate(sfWebRequest $request) {
    $this->user = $this->getRoute()->getObject();
    $this->form = new UserForm($this->user);

    $this->_processForm($request, $this->form);

    $this->setTemplate('form');
  }

  protected function _processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $success = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      $user = $form->save();
      $this->getUser()->setFlash('success', $success);
      $this->redirect(array('sf_route' => 'user_edit', 'sf_subject' => $user));
    }
  }

  protected function _getPager() {
    $query = Doctrine_Query::create()->from('User u');
    $pager = new sfDoctrinePager('User', 2);
    $pager->setQuery($query);
    $pager->setPage($this->_getPage());
    $pager->init();

    return $pager;
  }

  protected function _setPage($page) {
    $this->getUser()->setAttribute('kiwi.user.page', $page);
  }

  protected function _getPage() {
    return $this->getUser()->getAttribute('kiwi.user.page', 1);
  }
}
