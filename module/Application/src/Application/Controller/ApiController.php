<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ApiController extends AbstractRestfulController
{
    public function registerDeviceAction()
    {
        $respuesta = array();
        return new JsonModel($respuesta);
    }
    public function setDeviceLocationAction()
    {
        $respuesta = array();
        return new JsonModel($respuesta);
    }
    public function indexAction()
    {
        $respuesta = array();
        return new JsonModel($respuesta);
    }
}