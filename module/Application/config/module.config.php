<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Api'        => 'Application\Controller\ApiController',
            'Application\Controller\Index'      => 'Application\Controller\IndexController',
            'Application\Controller\Dashboard'  => 'Application\Controller\DashboardController',
        ),
    ),
    'controller_plugins' => array(
        /*'invokables' => array(
            'Params' => 'Application\Controller\Plugin\Params',
        ),*/
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'api' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/[:action]',
                    /*'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*',
                        'xmln' => '[a-zA-Z0-9_-]*',
                        'xmlc' => '[*a-zA-Z0-9_-]*',
                    ),*/
                    'defaults' => array(
                        'controller' => 'Application\Controller\Api',
                        'action'     => 'index',
                    )
                ),
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'secure' => 'Application\Factory\SecureServiceFactory'
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
            'display_exceptions'       => true,
            'doctype'                  => 'HTML5',
            'not_found_template'       => 'error/404',
            'exception_template'       => 'error/index',
            'template_map' => array(
                //'layout'           => __DIR__ . '/../view/layout/layout.twig',
                'application/index/index' => __DIR__ . '/../view/application/index/index.twig',
                'error/404'               => __DIR__ . '/../view/error/404.phtml',
                'error/index'             => __DIR__ . '/../view/error/index.phtml',
            ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'zfctwig' => array(
        'environment_loader' => 'ZfcTwigLoaderChain',
        'environment_options' => array(
            'debug' => true
        ),
        'environment_class' => 'Twig_Environment',
        'loader_chain' => array(
            'ZfcTwigLoaderTemplateMap',
            'ZfcTwigLoaderTemplatePathStack'
        ),
        'extensions' => array(
            'zfctwig' => 'ZfcTwigExtension'
        ),
        'suffix' => 'twig',
        'disable_zf_model' => true,
    ),
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
        )
    )
);
