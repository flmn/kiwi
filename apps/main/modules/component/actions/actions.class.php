<?php

/**
 * component actions.
 *
 * @package    kiwi
 * @subpackage component
 * @author     jitao
 * @version
 */
class componentActions extends sfActions {
/**
 * Executes index action
 *
 * @param sfRequest $request A request object
 */
  public function executeIndex(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $componentTable = Doctrine::getTable('Component');
    $root = Doctrine_Query::create()->from('Component c')->where('c.root_id = ?', $this->project['id'])->addWhere('c.level = 0')->fetchOne();
    if (!$root) {
      $root = new Component();
      $root['project_id'] = $this->project['id'];
      $root['name'] = 'root';
      $root['root_id'] = $this->project['id'];
      $root->save();
      $componentTable->getTree()->createRoot($root);
    }
    $this->components = Doctrine_Query::create()->from('Component c')->where('c.root_id = ?', $this->project['id'])->addOrderBy('lft')->execute(array(), Doctrine::HYDRATE_RECORD);
  }

  /**
   * Executes new action
   *
   * @param sfRequest $request A request object
   */
  public function executeNew(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->form = new ComponentForm($this->project);

    if ($request->isMethod('post')) {
      $this->_processForm($request, $this->form);
    }

    $this->setTemplate('form');
  }

  public function executeEdit(sfWebRequest $request) {
    $this->project = Doctrine::getTable('Project')->findOneByIdentifier($request->getParameter('project_id'));
    $this->component = Doctrine::getTable('Component')->find($request->getParameter('id'));
    $this->form = new ComponentForm($this->project, $this->component);

    if ($request->isMethod('post')) {
      $this->_processForm($request, $this->form);
    }

    $this->setTemplate('form');
  }

  protected function _processForm(sfWebRequest $request, sfForm $form) {
    $parameters = array_merge($request->getParameter($form->getName()), array('project_id' => $this->project->getId()));
    $form->bind($parameters, $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $success = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      $component = $form->save();
      $this->getUser()->setFlash('success', $success);
      $this->redirect(array('sf_route' => 'component_edit', 'project_id' => $this->project->getIdentifier(), 'id' => $component->getId()));
    }
  }
}
