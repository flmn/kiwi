<?php

/**
 * ticket actions.
 *
 * @package    kiwi
 * @subpackage ticket
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class ticketActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeList(sfWebRequest $request) {
    $this->project = $this->getRoute()->getObject();
  }
}
