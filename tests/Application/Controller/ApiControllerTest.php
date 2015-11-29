<?php
/**
 * @version 1.0
 * @copyright (c) 2016, Rioxygen.com.mx
 */
namespace Application\Controller;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
//use Zend\Authentication\AuthenticationService;
use Zend\Stdlib\ParametersInterface;
use Zend\Http\Request;
Use \Bootstrap;

/**
 * Clase para el testeo de registro de un device Id
 * @author Ricardo Ruiz <ricardo.ruiz@rioxygen.com.mx>
 */
class ApiControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Url Base para testeo
     * @var string
     */
    private $url;
    /**
     * crea los objetos necesarios para todos los controllers
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    public function setUp()
    {
        $this->setApplicationConfig( Bootstrap::getConfig());
        $this->setUrl("/");
        $_SERVER = array();
        $_SERVER['SERVER_PROTOCOL'] = "https";
    }
    /**
     * Test el registro de un device
     */
    public function testRegisterDevice()
    {
        $url    = $this->getUrl() . "api/registerDevice";
        $this->dispatch($url);
        $this->assertResponseStatusCode(200);
    }
    /**
     * Test el registro de un device
     */
    public function testSetDeviceLocation()
    {
        $url    = $this->getUrl() . "api/setDeviceLocation";
        $this->dispatch($url);
        $this->assertResponseStatusCode(200);
    }
    /**
     * Regresa la url seteada
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    /**
     * Setea la Url a Testear
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}