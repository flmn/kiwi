<?php

/**
 * account actions.
 *
 * @package    kiwi
 * @subpackage account
 * @author     jitao
 * @version
 */
class accountActions extends sfActions {
/**
 * Executes login action
 *
 * @param sfRequest $request A request object
 */
  public function executeLogin(sfWebRequest $request) {
    $user = $this->getUser();
    if ($user->isAuthenticated()) {
      return $this->redirect('homepage');
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

        return $this->redirect('homepage');
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
    return $this->redirect('homepage');
  }

  /**
   * Executes secure action
   *
   * @param sfRequest $request A request object
   */
  public function executeSecure(sfWebRequest $request) {
  }

  /**
   * Executes profile action
   *
   * @param sfRequest $request A request object
   */
  public function executeProfile(sfWebRequest $request) {
    $this->user = $this->getUser()->getUserObject();
    $this->cultures = sfConfig::get('sf_cultures');
    $this->themes = sfConfig::get('sf_themes');
  }

  /**
   * Executes profileEdit action
   *
   * @param sfRequest $request A request object
   */
  public function executeProfileEdit(sfWebRequest $request) {
    $user = $this->getUser();

    $this->form = new ProfileForm($user->getUserObject());

    if ($request->isMethod('post')) {
      $parameters = array_merge($request->getParameter($this->form->getName()), array('id' => $user->getUserObject()->getId()));
      $this->form->bind($parameters, $request->getFiles($this->form->getName()));
      if ($this->form->isValid()) {
        $this->form->save();
        $user->updateProfile();
        $user->setFlash('success', 'The item was updated successfully.', false);
      }
    }
  }
}
