<?php
/**
 * @version 1.0
 * @copyright (c) 2016, Rioxygen.com
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

/**
 * Clase para el manejo del predispatch y aplicacion correcta de las áreas seguras
 *
 */
abstract  class AppAbstractController extends AbstractActionController {
    /**
     * Se encarga de colgar las funciones predispatch y post dispatch para ser ejecutados
     * antes y despues del controlador principal y poder realizar tareas comunes de 
     * inicializacion y post procesamiento  
     * @see \Zend\Mvc\Controller\AbstractController::attachDefaultListeners()
     */
    protected function attachDefaultListeners(){
        parent::attachDefaultListeners();
        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'),100);
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'postDispatch'),-100);
    
    }
    /**
     * Predespacha y valida el acceso
     */
    public function preDispatch()
    {
        $this->validateAccess();
    }
    /**
     * valida que el usuario este logueado y tenga permisos
     * antes de llamar al controlador requerido
     */
    protected function validateAccess()
    {
        $userId = null;
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            //get the user_id of the user
            $userId = $this->zfcUserAuthentication()->getIdentity()->getId();	
        }
        /* @var /Application/service/SecureInterface $secure */
        $secure = $this->serviceLocator->get('secure');
        if ($secure->validateUserAccess($userId,$this->params('controller'),$this->params('action'))) {
            return;
        } else {
            $this->redirect()->toRoute('home');
            $this->event->stopPropagation(true);
        }
    }
    /**
     * 
     */
    public function postDispatch(){
        //postDispatch routine
    }
}