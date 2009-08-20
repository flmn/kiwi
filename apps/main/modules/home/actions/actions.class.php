<?php

/**
 * home actions.
 *
 * @package    kiwi
 * @subpackage home
 * @author     jitao
 */
class homeActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
    $user_id = $this->getUser()->getUserObject()->getId();
    $this->projects = Doctrine_Query::create()->from('ProjectUserRole pur')->where('pur.user_id = ?', $user_id)->groupBy('pur.project_id')->execute(array(), Doctrine::HYDRATE_RECORD);
  }
}
