<?php


use Zend\Mvc;
use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Service\ServiceManagerConfig;
/**
 * Bootstrap for unit testing
 *  @author pcarrillo
 */
chdir(dirname(__DIR__));
putenv('APPLICATION_ENV');
define('REQUEST_MICROTIME', microtime(true));
error_reporting(E_ALL | E_STRICT);
include __DIR__ . '/../init_autoloader.php';
class Bootstrap
{
    protected static $config;
    protected static $sm = null;
    protected static $smConfig;
    protected static $listeners;
    
    /**
     * Inicia el bootstrap
     */
    public static function init()
    {
        //FIXME dejar esto configurable
        date_default_timezone_set("America/Mexico_City");
        self::$config = include'config/application.config.php';
        self::$smConfig = isset($configuration['service_manager']) ? $configuration['service_manager'] : array();
        self::$listeners = isset($configuration['listeners']) ? $configuration['listeners'] : array();
        
    }
    /**
     * Obtiene la configuracion
     * @return array
     */
    public static function getConfig()
    {
        return self::$config;
    }
    /**
     * Regresa el Service MAnager
     * @return ServiceManager
     */
    public static function getSm()
    {
        if (self::$sm === null){
            self::$sm = self::configSm();
        }
        return self::$sm;
    }
    /**
     * REgresa la configuracion del SM
     * @return ServiceManager
     */
    private static function configSm()
    {
        $serviceManager = new ServiceManager(new ServiceManagerConfig(self::$smConfig));
        $serviceManager->setService('ApplicationConfig', self::$config);
        $serviceManager->get('ModuleManager')->loadModules();
        $serviceManager->get('Application')->bootstrap(self::$listeners);
        return $serviceManager;
    }
}
Bootstrap::init();
