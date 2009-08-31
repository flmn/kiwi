<?php

class mySecurityFilter extends sfFilter {
/**
 * Executes this filter.
 *
 * @param sfFilterChain $filterChain A sfFilterChain instance
 */
  public function execute($filterChain) {
    if ((sfConfig::get('sf_login_module') == $this->context->getModuleName()) && (sfConfig::get('sf_login_action') == $this->context->getActionName())
        || (sfConfig::get('sf_secure_module') == $this->context->getModuleName()) && (sfConfig::get('sf_secure_action') == $this->context->getActionName())) {
      $filterChain->execute();
      return;
    }

    if (!$this->context->getUser()->isAuthenticated()) {
      $this->forwardToLoginAction();
    }

    if (in_array($this->context->getModuleName(), sfConfig::get('app_security_project_modules'))) {
      $project_identifier = $this->context->getRequest()->getParameter('project_id');
      $permission = $this->context->getController()->getActionStack()->getLastEntry()->getActionInstance()->getCredential();
      if (!$this->context->getUser()->hasPermission($project_identifier, $permission)) {
        $this->forwardToSecureAction();
      }
    } else { //normal
      $credential = $this->getUserCredential();
      if (!is_null($credential) && !$this->context->getUser()->hasCredential($credential)) {
        $this->forwardToSecureAction();
      }
    }

    // the user has access, continue
    $filterChain->execute();
  }

  /**
   * Forwards the current request to the secure action.
   *
   * @throws sfStopException
   */
  protected function forwardToSecureAction() {
    $this->context->getController()->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

    throw new sfStopException();
  }

  /**
   * Forwards the current request to the login action.
   *
   * @throws sfStopException
   */
  protected function forwardToLoginAction() {
    $this->context->getController()->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

    throw new sfStopException();
  }

  /**
   * Returns the credential required for this action.
   *
   * @return mixed The credential required for this action
   */
  protected function getUserCredential() {
    return $this->context->getController()->getActionStack()->getLastEntry()->getActionInstance()->getCredential();
  }
}
