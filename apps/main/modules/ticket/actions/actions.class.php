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
    $this->project = $this->getRoute()->getObject();
  }

  /**
   * Executes new action
   *
   * @param sfRequest $request A request object
   */
  public function executeNew(sfWebRequest $request) {
    $this->project = $this->getRoute()->getObject();
    $this->form = new TicketForm();
    $this->ticket = $this->form->getObject();
    $this->setTemplate('form');
  }

  public function executeCreate(sfWebRequest $request) {
    
  }
}
