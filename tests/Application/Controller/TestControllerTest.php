<?php
/**
 * @author Ricardo Ruiz <rrcfesc@gmail.com>
 * @version 1.0
 * @copyright (c) 2015
 */
namespace Application\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Zend\Authentication\AuthenticationService;
use Zend\Stdlib\ParametersInterface;
use Zend\Http\Request;
Use \Bootstrap;

/**
 * Prueba de integracion del controllador
 */
class TestControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * crea los objetos necesarios para todos los controllers
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    public function setUp()
    {
        $this->setApplicationConfig(Bootstrap::getConfig());
    }
    /**
     * Prueba si el auth responde en 200
     */
    public function testAuthHomeAction()
    {
        $this->assertResponseStatusCode(200);
    }
}
