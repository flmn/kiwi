<?php

/**
 * account actions.
 *
 * @package    kiwi
 * @subpackage account
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class accountActions extends sfActions
{
 /**
  * Executes login action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request) {
    $user = $this->getUser();
    if ($user->isAuthenticated()) {
      return $this->redirect('@homepage');
    }

    if ($request->isXmlHttpRequest()) {
      $this->getResponse()->setHeaderOnly(true);
      $this->getResponse()->setStatusCode(401);

      return sfView::NONE;
    }

    $this->form = new LoginForm();

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid()) {
        $values = $this->form->getValues();
        $this->getUser()->login($values['user']);

        return $this->redirect('@homepage');
      }
    } else {
      $this->getResponse()->setStatusCode(401);
    }
  }

  /**
   * Executes logout action
   *
   * @param sfRequest $request A request object
   */
  public function executeLogout(sfWebRequest $request) {
    $this->getUser()->logout();
    return $this->redirect('@homepage');
  }
}
